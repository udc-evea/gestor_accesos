<?php

/**
 * sfGuardUserGroup filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BasesfGuardUserGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserGroup';
  }

  public function getFields()
  {
    return array(
      'user_id'  => 'ForeignKey',
      'group_id' => 'ForeignKey',
    );
  }
}
