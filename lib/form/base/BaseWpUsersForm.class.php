<?php

/**
 * WpUsers form base class.
 *
 * @method WpUsers getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseWpUsersForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ID'                  => new sfWidgetFormInputHidden(),
      'user_login'          => new sfWidgetFormInputText(),
      'user_pass'           => new sfWidgetFormInputText(),
      'user_nicename'       => new sfWidgetFormInputText(),
      'user_email'          => new sfWidgetFormInputText(),
      'user_url'            => new sfWidgetFormInputText(),
      'user_registered'     => new sfWidgetFormDateTime(),
      'user_activation_key' => new sfWidgetFormInputText(),
      'user_status'         => new sfWidgetFormInputText(),
      'display_name'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'ID'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_login'          => new sfValidatorString(array('max_length' => 60)),
      'user_pass'           => new sfValidatorString(array('max_length' => 64)),
      'user_nicename'       => new sfValidatorString(array('max_length' => 50)),
      'user_email'          => new sfValidatorString(array('max_length' => 100)),
      'user_url'            => new sfValidatorString(array('max_length' => 100)),
      'user_registered'     => new sfValidatorDateTime(),
      'user_activation_key' => new sfValidatorString(array('max_length' => 60)),
      'user_status'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'display_name'        => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('wp_users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WpUsers';
  }


}
