<?php

/**
 * MdlUser form base class.
 *
 * @method MdlUser getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseMdlUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'auth'              => new sfWidgetFormInputText(),
      'confirmed'         => new sfWidgetFormInputCheckbox(),
      'policyagreed'      => new sfWidgetFormInputCheckbox(),
      'deleted'           => new sfWidgetFormInputCheckbox(),
      'suspended'         => new sfWidgetFormInputCheckbox(),
      'mnethostid'        => new sfWidgetFormInputText(),
      'username'          => new sfWidgetFormInputText(),
      'password'          => new sfWidgetFormInputText(),
      'idnumber'          => new sfWidgetFormInputText(),
      'firstname'         => new sfWidgetFormInputText(),
      'lastname'          => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'emailstop'         => new sfWidgetFormInputCheckbox(),
      'icq'               => new sfWidgetFormInputText(),
      'skype'             => new sfWidgetFormInputText(),
      'yahoo'             => new sfWidgetFormInputText(),
      'aim'               => new sfWidgetFormInputText(),
      'msn'               => new sfWidgetFormInputText(),
      'phone1'            => new sfWidgetFormInputText(),
      'phone2'            => new sfWidgetFormInputText(),
      'institution'       => new sfWidgetFormInputText(),
      'department'        => new sfWidgetFormInputText(),
      'address'           => new sfWidgetFormInputText(),
      'city'              => new sfWidgetFormInputText(),
      'country'           => new sfWidgetFormInputText(),
      'lang'              => new sfWidgetFormInputText(),
      'calendartype'      => new sfWidgetFormInputText(),
      'theme'             => new sfWidgetFormInputText(),
      'timezone'          => new sfWidgetFormInputText(),
      'firstaccess'       => new sfWidgetFormInputText(),
      'lastaccess'        => new sfWidgetFormInputText(),
      'lastlogin'         => new sfWidgetFormInputText(),
      'currentlogin'      => new sfWidgetFormInputText(),
      'lastip'            => new sfWidgetFormInputText(),
      'secret'            => new sfWidgetFormInputText(),
      'picture'           => new sfWidgetFormInputText(),
      'url'               => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormTextarea(),
      'descriptionformat' => new sfWidgetFormInputText(),
      'mailformat'        => new sfWidgetFormInputCheckbox(),
      'maildigest'        => new sfWidgetFormInputCheckbox(),
      'maildisplay'       => new sfWidgetFormInputText(),
      'autosubscribe'     => new sfWidgetFormInputCheckbox(),
      'trackforums'       => new sfWidgetFormInputCheckbox(),
      'timecreated'       => new sfWidgetFormInputText(),
      'timemodified'      => new sfWidgetFormInputText(),
      'trustbitmask'      => new sfWidgetFormInputText(),
      'imagealt'          => new sfWidgetFormInputText(),
      'lastnamephonetic'  => new sfWidgetFormInputText(),
      'firstnamephonetic' => new sfWidgetFormInputText(),
      'middlename'        => new sfWidgetFormInputText(),
      'alternatename'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'auth'              => new sfValidatorString(array('max_length' => 20)),
      'confirmed'         => new sfValidatorBoolean(),
      'policyagreed'      => new sfValidatorBoolean(),
      'deleted'           => new sfValidatorBoolean(),
      'suspended'         => new sfValidatorBoolean(),
      'mnethostid'        => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'username'          => new sfValidatorString(array('max_length' => 100)),
      'password'          => new sfValidatorString(array('max_length' => 255)),
      'idnumber'          => new sfValidatorString(array('max_length' => 255)),
      'firstname'         => new sfValidatorString(array('max_length' => 100)),
      'lastname'          => new sfValidatorString(array('max_length' => 100)),
      'email'             => new sfValidatorString(array('max_length' => 100)),
      'emailstop'         => new sfValidatorBoolean(),
      'icq'               => new sfValidatorString(array('max_length' => 15)),
      'skype'             => new sfValidatorString(array('max_length' => 50)),
      'yahoo'             => new sfValidatorString(array('max_length' => 50)),
      'aim'               => new sfValidatorString(array('max_length' => 50)),
      'msn'               => new sfValidatorString(array('max_length' => 50)),
      'phone1'            => new sfValidatorString(array('max_length' => 20)),
      'phone2'            => new sfValidatorString(array('max_length' => 20)),
      'institution'       => new sfValidatorString(array('max_length' => 255)),
      'department'        => new sfValidatorString(array('max_length' => 255)),
      'address'           => new sfValidatorString(array('max_length' => 255)),
      'city'              => new sfValidatorString(array('max_length' => 120)),
      'country'           => new sfValidatorString(array('max_length' => 2)),
      'lang'              => new sfValidatorString(array('max_length' => 30)),
      'calendartype'      => new sfValidatorString(array('max_length' => 30)),
      'theme'             => new sfValidatorString(array('max_length' => 50)),
      'timezone'          => new sfValidatorString(array('max_length' => 100)),
      'firstaccess'       => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'lastaccess'        => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'lastlogin'         => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'currentlogin'      => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'lastip'            => new sfValidatorString(array('max_length' => 45)),
      'secret'            => new sfValidatorString(array('max_length' => 15)),
      'picture'           => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'url'               => new sfValidatorString(array('max_length' => 255)),
      'description'       => new sfValidatorString(array('required' => false)),
      'descriptionformat' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'mailformat'        => new sfValidatorBoolean(),
      'maildigest'        => new sfValidatorBoolean(),
      'maildisplay'       => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'autosubscribe'     => new sfValidatorBoolean(),
      'trackforums'       => new sfValidatorBoolean(),
      'timecreated'       => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'timemodified'      => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'trustbitmask'      => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'imagealt'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastnamephonetic'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'firstnamephonetic' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'middlename'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'alternatename'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'MdlUser', 'column' => array('mnethostid', 'username')))
    );

    $this->widgetSchema->setNameFormat('mdl_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MdlUser';
  }


}
