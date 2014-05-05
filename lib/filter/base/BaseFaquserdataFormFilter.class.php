<?php

/**
 * Faquserdata filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaquserdataFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'last_modified' => new sfWidgetFormFilterInput(),
      'display_name'  => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'last_modified' => new sfValidatorPass(array('required' => false)),
      'display_name'  => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquserdata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquserdata';
  }

  public function getFields()
  {
    return array(
      'user_id'       => 'ForeignKey',
      'last_modified' => 'Text',
      'display_name'  => 'Text',
      'email'         => 'Text',
    );
  }
}
