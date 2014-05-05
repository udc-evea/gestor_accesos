<?php

/**
 * FaquserRight filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaquserRightFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('faquser_right_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaquserRight';
  }

  public function getFields()
  {
    return array(
      'user_id'  => 'Number',
      'right_id' => 'Number',
    );
  }
}
