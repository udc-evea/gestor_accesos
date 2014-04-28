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
  
  public function executeCrearUsuario(sfWebRequest $request)
  {
    $user     = $request->getParameter("user");
    $producto = (int)$request->getParameter("producto");
    
    $prod = ProductoQuery::create()->findPk($producto);
    $this->forward404Unless($prod);
    
    $usr = sfGuardUserQuery::create()->findOneByUsername($user);
    $this->forward404Unless($usr);
    
    try
    {
      UsuarioPlataforma::factory($prod)->crearNuevo($usr);
      $this->getUser()->setFlash("notice", "Operación exitosa");
      
    } catch (Exception $ex) {
      $this->getUser()->setFlash("error", "El registro no pudo guardarse. Intente realizar la operación manualmente (desde el componente).");
    }
    
    return $this->redirect($this->generateUrl('sf_guard_user', array('sf_action' => 'ListVerAccesos', 'sf_subject' => $usr)));
  }
}
