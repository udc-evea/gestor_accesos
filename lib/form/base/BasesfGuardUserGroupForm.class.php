<?php

/**
 * sfGuardUserGroup form base class.
 *
 * @method sfGuardUserGroup getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BasesfGuardUserGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'  => new sfWidgetFormInputHidden(),
      'group_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'group_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardGroup', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserGroup';
  }


}
