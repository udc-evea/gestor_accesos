<?php

/**
 * FaquserGroup filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaquserGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('faquser_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaquserGroup';
  }

  public function getFields()
  {
    return array(
      'user_id'  => 'Number',
      'group_id' => 'Number',
    );
  }
}
