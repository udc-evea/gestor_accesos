<?php

/**
 * Description of UsuarioWordpress
 *
 * @author universidad
 */
class UsuarioWordpress extends UsuarioPlataforma
{
  const STATUS_DELETED = 666;
  const STATUS_ACTIVE = 0;
  /* @var $usuario_nativo WpUsers */
  /**
   * 
   * @param type $username nombre de usuario
   * @return WpUsers el usuario nativo
   */
  public function getUsuarioNativo()
  {
    if(null == $this->username) return null;
    if($this->usuario_nativo != null) return $this->usuario_nativo;
    
    $usr = WpUsersQuery::create()->findOneByUserLogin($this->username);
    $this->usuario_nativo = $usr;
    
    return $this->usuario_nativo;
  }

  public function crearNuevo(\sfGuardUser $user, $otros_datos = null)
  {
    $wordpress_user = new WpUsers();
    $wordpress_user
          ->setUserLogin($user->getUsername())
          ->setUserPass(md5($user->getPasswordPlain()))
          ->setUserNicename($user->getProfile()->getApeynom())
          ->setUserEmail($user->getProfile()->getEmail())
          ->setUserRegistered(new DateTime())
          ->setDisplayName($user->getProfile()->getApeynom())
          ->save();
    
    $this->usuario_nativo = $wordpress_user;
    
    return true;
  }
  
  public function actualizar(\sfGuardUser $user, $otros_datos = null)
  {
    $wordpress_user = WpUsersQuery::create()->findOneByUserLogin($user->getUsername());
    
    if(!$wordpress_user) throw new Exception("Usuario inexistente");
    
    $wordpress_user
          ->setUserLogin($user->getUsername())
          ->setUserPass(md5($user->getPasswordPlain()))
          ->setUserNicename($user->getProfile()->getApeynom())
          ->setUserEmail($user->getProfile()->getEmail())
          ->setDisplayName($user->getProfile()->getApeynom())
          ->setUserStatus(self::STATUS_ACTIVE)
          ->save();
    
    $this->usuario_nativo = $wordpress_user;
    
    return true;
  }

  public function baja(\sfGuardUser $user, $otros_datos = null)
  {
    $wordpress_user = WpUsersQuery::create()->findOneByUserLogin($user->getUsername());
    
    if(!$wordpress_user) throw new Exception("Usuario inexistente");
    
    srand(microtime(true));
    $wordpress_user
          ->setUserPass(md5(rand(0, getrandmax())))   //no existe la baja logica en WP!
          ->setUserStatus(self::STATUS_DELETED)       //solo uso interno!
          ->save();
    
    $this->usuario_nativo = $wordpress_user;
    
    return true;
  }

  public function fueEliminado()
  {
    return (bool)$this->getUsuarioNativo()->getUserStatus() == self::STATUS_DELETED;
  }
}
