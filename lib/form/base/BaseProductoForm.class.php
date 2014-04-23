<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInputText(),
      'descripcion'  => new sfWidgetFormTextarea(),
      'url_acceso'   => new sfWidgetFormInputText(),
      'url_login'    => new sfWidgetFormInputText(),
      'nombre_corto' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 200)),
      'descripcion'  => new sfValidatorString(),
      'url_acceso'   => new sfValidatorString(array('max_length' => 255)),
      'url_login'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_corto' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


}
