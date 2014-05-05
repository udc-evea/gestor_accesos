<?php

/**
 * Faquserlogin filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaquserloginFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pass'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'pass'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquserlogin_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquserlogin';
  }

  public function getFields()
  {
    return array(
      'login' => 'ForeignKey',
      'pass'  => 'Text',
    );
  }
}
