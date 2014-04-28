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
  

  public function getUsuarioProducto(Producto $prod)
  {
    switch($prod->getId())
    {
      case ProductoPeer::MOODLE:
        $usr = new getUsuarioNativo($this->user);
        
        if(!$usr) return null;
        
        $usuario = new getUsuarioNativo($usr);
        
      break;
    }
  }
  
  /**
   * Mismo server = fácil, consultamos la base directamente
   */
  public function getUsuarioMoodle()
  {
    $user= MdlUserQuery::create()->findOneByUsername();
    
    return false;
  }
  
  public function verificarUsuarioPMF()
  {
    
  }
  
  public function verificarUsuarioWordPress()
  {
    
  }
  
  
  
}