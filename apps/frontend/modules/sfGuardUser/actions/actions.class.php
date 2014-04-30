<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 12965 2008-11-13 06:02:38Z fabien $
 */
class sfGuardUserActions extends BasesfGuardUserActions
{
  public function executeListVerAccesos(sfWebRequest $request)
  {
    $this->usuario = $this->getRoute()->getObject();
    $this->productos = ProductoQuery::create()->orderByNombre()->find();
  }
  
  public function executeActualizarUsuario(sfWebRequest $request)
  {
    return $this->procesarUsuarioPlataforma($request, "actualizar");
  }
  
  public function executeCrearUsuario(sfWebRequest $request)
  {
    return $this->procesarUsuarioPlataforma($request, "crearNuevo");
  }
  
  public function executeBajaUsuario(sfWebRequest $request)
  {
    return $this->procesarUsuarioPlataforma($request, "baja");
  }
  
  protected function procesarUsuarioPlataforma(sfWebRequest $request, $operacionUsuario)
  {
    $user     = $request->getParameter("user");
    $producto = (int)$request->getParameter("producto");
    
    $prod = ProductoQuery::create()->findPk($producto);
    $this->forward404Unless($prod);
    
    $usr = sfGuardUserQuery::create()->findOneByUsername($user);
    $this->forward404Unless($usr);
    
    try
    {
      UsuarioPlataforma::factory($prod)->$operacionUsuario($usr);
      $this->getUser()->setFlash("notice", "Operación exitosa");
      
    } catch (Exception $ex) {
      $this->getUser()->setFlash("error", "La operación no pudo completarse. Intente realizar la operación manualmente (desde el componente).");
    }
    
    return $this->returnOK($request);
  }
  
  protected function returnOK(sfWebRequest $request)
  {
    $this->getResponse()->setContentType("application/json");
    $resp = json_encode(array());
    return $this->renderText($resp);
  }
    
}
