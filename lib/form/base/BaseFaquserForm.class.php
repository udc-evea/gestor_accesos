<?php

/**
 * Faquser form base class.
 *
 * @method Faquser getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaquserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'           => new sfWidgetFormInputHidden(),
      'login'             => new sfWidgetFormInputText(),
      'session_id'        => new sfWidgetFormInputText(),
      'session_timestamp' => new sfWidgetFormInputText(),
      'ip'                => new sfWidgetFormInputText(),
      'account_status'    => new sfWidgetFormInputText(),
      'last_login'        => new sfWidgetFormInputText(),
      'auth_source'       => new sfWidgetFormInputText(),
      'member_since'      => new sfWidgetFormInputText(),
      'remember_me'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'user_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getUserId()), 'empty_value' => $this->getObject()->getUserId(), 'required' => false)),
      'login'             => new sfValidatorString(array('max_length' => 25)),
      'session_id'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'session_timestamp' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ip'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'account_status'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'last_login'        => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'auth_source'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'member_since'      => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'remember_me'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Faquser', 'column' => array('login'))),
        new sfValidatorPropelUnique(array('model' => 'Faquser', 'column' => array('session_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('faquser[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquser';
  }


}
