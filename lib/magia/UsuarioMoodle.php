<?php

/**
 * Description of UsuarioMoodle
 *
 * @author universidad
 */
class UsuarioMoodle extends UsuarioPlataforma
{
  /* @var $usuario_nativo MdlUser */
  /**
   * 
   * @param type $username nombre de usuario
   * @return MdlUser el usuario nativo
   */
  public function getUsuarioNativo()
  {
    if(null == $this->username) return null;
    if($this->usuario_nativo != null) return $this->usuario_nativo;
    
    $usr = MdlUserQuery::create()->findOneByUsername($this->username);
    $this->usuario_nativo = $usr;
    
    return $this->usuario_nativo;
  }

  public function crearNuevo(\sfGuardUser $user, $otros_datos = null)
  {
    $moodle_user = new MdlUser();
    $moodle_user
          ->setAuth('manual')
          ->setConfirmed(1)
          ->setMnethostid(1)
          ->setEmail($user->getProfile()->getEmail())
          ->setUsername($user->getUsername())
          ->setPassword(md5($user->getPasswordPlain()))
          ->setLastname($user->getProfile()->getApeynom())
          ->setFirstname(" ")
          ->save();
    
    $this->usuario_nativo = $moodle_user;
    
    return true;
  }
  
  public function actualizar(\sfGuardUser $user, $otros_datos = null)
  {
    $moodle_user = MdlUserQuery::create()->findOneByUsername($user->getUsername());
    
    if(!$moodle_user) throw new Exception("Usuario inexistente");
    
    $moodle_user
          ->setAuth('manual')
          ->setConfirmed(1)
          ->setMnethostid(1)
          ->setEmail($user->getProfile()->getEmail())
          ->setUsername($user->getUsername())
          ->setPassword(md5($user->getPasswordPlain()))
          ->setLastname($user->getProfile()->getApeynom())
          ->setFirstname(" ")
          ->setDeleted(false)   //por las dudas, restablezco el acceso.
          ->save();
    
    $this->usuario_nativo = $moodle_user;
    
    return true;
  }

  public function baja(\sfGuardUser $user, $otros_datos = null)
  {
    $moodle_user = MdlUserQuery::create()->findOneByUsername($user->getUsername());
    
    if(!$moodle_user) throw new Exception("Usuario inexistente");
    
    $moodle_user
          ->setDeleted(true)
          ->save();
    
    $this->usuario_nativo = $moodle_user;
    
    return true;
  }

  public function fueEliminado()
  {
    return (bool)$this->getUsuarioNativo()->getDeleted();
  }
}
