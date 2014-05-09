<?php

/**
 * inicio actions.
 *
 * @package    symfony1-baseproject
 * @subpackage inicio
 * @author     mppfiles
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->prods = ProductoQuery::create()->orderByNombre()->find();
  }
  
  public function executeAccesoDirecto(sfWebRequest $request)
  {
    $producto = $request->getParameter('producto');
    $this->prod = ProductoQuery::create()->findOneByNombreCorto($producto);
    
    $this->forward404Unless($this->prod, 'No existe el componente solicitado.');
  }
}
