<?php

/**
 * SfGuardUserProfile filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseSfGuardUserProfileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'apeynom' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dni'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'apeynom' => new sfValidatorPass(array('required' => false)),
      'dni'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'user_id' => 'ForeignKey',
      'apeynom' => 'Text',
      'dni'     => 'Number',
      'email'   => 'Text',
    );
  }
}
