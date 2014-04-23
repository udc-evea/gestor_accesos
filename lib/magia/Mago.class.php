<?php

class Mago
{
  private $user, $pass, $hash;

  
  public function __construct($user, $pass, $hash)
  {
    $this->user = $user;
    $this->pass = $pass;
    $this->hash = $hash;
  }
  
  /**
   * Mismo server = fácil, consultamos la base directamente
   */
  public function verificarUsuarioMoodle()
  {
    $q = "SELECT * FROM moodle.mdl_user WHERE ";
    
    return false;
  }
  
  public function verificarUsuarioPMF()
  {
    
  }
  
  public function verificarUsuarioWordPress()
  {
    
  }
  
  
  
}