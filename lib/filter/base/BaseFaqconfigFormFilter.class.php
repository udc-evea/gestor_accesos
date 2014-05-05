<?php

/**
 * Faqconfig filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaqconfigFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'config_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'config_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faqconfig_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faqconfig';
  }

  public function getFields()
  {
    return array(
      'config_name'  => 'Text',
      'config_value' => 'Text',
    );
  }
}
