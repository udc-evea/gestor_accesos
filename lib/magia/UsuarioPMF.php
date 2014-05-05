<?php

/**
 * Usuario de phpMyFaq
 *
 * @author universidad
 */
class UsuarioPMF extends UsuarioPlataforma
{
  const STATUS_BLOCKED   = 'blocked';
  const STATUS_ACTIVE    = 'active';
  const AUTHSOURCE_LOCAL = 'local';
  /**
   * 
   * @return Faquserlogin el usuario nativo
   */
  public function getUsuarioNativo()
  {
    if(null == $this->username) return null;
    if($this->usuario_nativo != null) return $this->usuario_nativo;
    
    $usr = FaquserloginQuery::create()->findUsuarioCompleto($this->username);
    $this->usuario_nativo = $usr;
    
    return $this->usuario_nativo;
  }

  public function crearNuevo(\sfGuardUser $user, $otros_datos = null)
  {
    $con = Propel::getConnection("pmf");
    
    //esto va en una transacción porque toco varias tablas
    try {
      $con->beginTransaction();
      
      //paso 1: creo el user (y seteo estado)
      $new_user = new Faquser();
      
      $new_user
        ->setLogin($user->getUsername())
        ->setAccountStatus(self::STATUS_ACTIVE)   //por las dudas, restablezco el acceso.
        ->setAuthSource(self::AUTHSOURCE_LOCAL)
        //...
        ->save();
      
      //paso 2: creo el userdata (email, nombre)
      $new_userdata = new Faquserdata();
      $new_userdata
              ->setUserId($new_user->getUserId())
              ->setEmail($user->getProfile()->getEmail())
              ->setDisplayName($user->getProfile()->getApeynom())
              //...
              ->save();
      
      //paso 3: obtengo el salt, y creo el userlogin (login, pass)
      $salt_config = FaqconfigQuery::create()->getSaltConfiguration();
      
      $new_userlogin = new Faquserlogin();
      $new_userlogin
          ->setLogin($user->getUsername())
          ->setPass(hash('sha256', $user->getPasswordPlain(). $salt_config. $user->getUsername()))
          ->save();
      
      $con->commit();
    } catch (PropelException $ex) {
      $con->rollback();
      throw new Exception("No se pudo completar la operación: ".$ex->getMessage());
    }
    
    $this->usuario_nativo = $new_user;
    
    return true;
  }
  
  public function actualizar(\sfGuardUser $user, $otros_datos = null)
  {
    $pmf_user = FaquserloginQuery::create()->findUsuarioCompleto($user->getUsername());
    
    if(!$pmf_user) throw new Exception("Usuario inexistente");
    
    $con = Propel::getConnection("pmf");
    
    //esto va en una transacción porque toco varias tablas
    try {
      $con->beginTransaction();
      
      //paso 1: actualizo el user (estado)
      $pmf_user
        ->getFaquser()
        ->setAccountStatus(self::STATUS_ACTIVE)   //por las dudas, restablezco el acceso.
        ->setLogin($user->getUsername())
        ->save();
              
      //paso 2: actualizo el userdata (email, nombre)
      $pmf_user->getFaquser()->getFaquserdata()
              ->setEmail($user->getProfile()->getEmail())
              ->setDisplayName($user->getProfile()->getApeynom())
              ->save();
      
      //paso 3: obtengo el salt, y actualizo el userlogin (login, pass)
      $salt_config = FaqconfigQuery::create()->getSaltConfiguration();
      
      $pmf_user
          ->setPass(hash('sha256', $user->getPasswordPlain(). $salt_config. $user->getUsername()))
          ->save();
      
      $con->commit();
    } catch (PropelException $ex) {
      $con->rollback();
      throw new Exception("No se pudo completar la operación: ".$ex->getMessage());
    }
    
    $this->usuario_nativo = $pmf_user;
    
    return true;
  }

  public function baja(\sfGuardUser $user, $otros_datos = null)
  {
    $pmf_user = FaquserloginQuery::create()->findUsuarioCompleto($user->getUsername());
    
    if(!$pmf_user) throw new Exception("Usuario inexistente");
    
    $pmf_user
          ->getFaquser()
          ->setAccountStatus(self::STATUS_BLOCKED)
          ->save();
    
    $this->usuario_nativo->setFaquser($pmf_user);
    
    return true;
  }

  public function fueEliminado() {
    return self::STATUS_BLOCKED == $this->getUsuarioNativo()->getFaquser()->getAccountStatus();
  }
}
