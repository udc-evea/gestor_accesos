<?php

/**
 * Producto filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseProductoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_acceso'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_login'    => new sfWidgetFormFilterInput(),
      'nombre_corto' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'url_acceso'   => new sfValidatorPass(array('required' => false)),
      'url_login'    => new sfValidatorPass(array('required' => false)),
      'nombre_corto' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre'       => 'Text',
      'descripcion'  => 'Text',
      'url_acceso'   => 'Text',
      'url_login'    => 'Text',
      'nombre_corto' => 'Text',
    );
  }
}
