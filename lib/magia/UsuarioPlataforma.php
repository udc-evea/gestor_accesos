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
  const PROD_WP     = 3;
  
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
        $up =  new UsuarioPMF();
       break;
     
     case self::PROD_WP:
        $up =  new UsuarioWordpress();
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
    elseif($this->fueEliminado()) return "DE BAJA";
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
  
  public function getEstado()
  {
    if(!$this->usuario_nativo) return "danger";
    else if($this->fueEliminado()) return "warning";
    else return "success";
  }
  
  
  abstract public function fueEliminado();
  abstract public function getUsuarioNativo();
  abstract public function crearNuevo(sfGuardUser $user, $otros_datos = null);
  abstract public function actualizar(sfGuardUser $user, $otros_datos = null);
  abstract public function baja(sfGuardUser $user, $otros_datos = null);
}