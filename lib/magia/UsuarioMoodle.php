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

  public function getEstado()
  {
    if(!$this->usuario_nativo) return "danger";
    else if($this->usuario_nativo->getDeleted()) return "warning";
    else return "success";
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
  }
  
  public function actualizar(\sfGuardUser $user, $otros_datos = null)
  {
    
  }

  public function eliminar(\sfGuardUser $user, $otros_datos = null)
  {
    
  }

  public function fueEliminado() {
    return (bool)$this->getUsuarioNativo()->getDeleted();
  }

}
