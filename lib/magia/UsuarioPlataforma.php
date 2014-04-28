<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioPlataforma
 *
 * @author universidad
 */
abstract class UsuarioPlataforma
{
  const PROD_MOODLE = 1;
  const PROD_PMF    = 2;
  
  protected $producto;
  protected $usuario_nativo;
  protected $username;

  public static function factory(Producto $prod, $username = null)
  {
    if($prod == null)
      throw new InvalidArgumentException("Producto requerido");
    
    switch($prod->getPrimaryKey())
    {
      case self::PROD_MOODLE:
        $up = new UsuarioMoodle();
      break;
     
     case self::PROD_PMF:
        $up =  new UsuarioMoodle();
       break;
       
      default:
        throw new Exception("Producto inexistente");
      break;
    }
    
    $up->producto = $prod;
    
    if($username != null)
    {
      $up->username = $username;
      $up->getUsuarioNativo();
    }
    return $up;
  }
  
  public function getEstadoTexto()
  {
    if(!$this->usuario_nativo) return "INEXISTENTE";
    else return "ACTIVO";
  }
  
  public function getEstadoLabel()
  {
    $e = $this->getEstado();
    
    return $e == 'danger' ? 'important' : $e;
  }
  
  public function noExiste() {
    return $this->getEstadoTexto() == "INEXISTENTE";
  }
  
  
  abstract public function fueEliminado();
  abstract public function getEstado();
  abstract public function getUsuarioNativo();
  abstract public function crearNuevo(sfGuardUser $user, $otros_datos = null);
  abstract public function actualizar(sfGuardUser $user, $otros_datos = null);
  abstract public function eliminar(sfGuardUser $user, $otros_datos = null);
}