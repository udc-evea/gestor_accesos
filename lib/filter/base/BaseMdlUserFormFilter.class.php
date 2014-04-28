<?php

/**
 * MdlUser filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseMdlUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'auth'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'confirmed'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'policyagreed'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'deleted'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'suspended'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'mnethostid'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idnumber'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'emailstop'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'icq'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skype'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'yahoo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'aim'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'msn'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone1'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone2'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'institution'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'department'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lang'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'theme'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timezone'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstaccess'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastaccess'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastlogin'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currentlogin'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastip'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'secret'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'picture'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'       => new sfWidgetFormFilterInput(),
      'descriptionformat' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mailformat'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'maildigest'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'maildisplay'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'htmleditor'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'autosubscribe'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'trackforums'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'timecreated'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timemodified'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trustbitmask'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'imagealt'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'auth'              => new sfValidatorPass(array('required' => false)),
      'confirmed'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'policyagreed'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'deleted'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'suspended'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'mnethostid'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'          => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'idnumber'          => new sfValidatorPass(array('required' => false)),
      'firstname'         => new sfValidatorPass(array('required' => false)),
      'lastname'          => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'emailstop'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'icq'               => new sfValidatorPass(array('required' => false)),
      'skype'             => new sfValidatorPass(array('required' => false)),
      'yahoo'             => new sfValidatorPass(array('required' => false)),
      'aim'               => new sfValidatorPass(array('required' => false)),
      'msn'               => new sfValidatorPass(array('required' => false)),
      'phone1'            => new sfValidatorPass(array('required' => false)),
      'phone2'            => new sfValidatorPass(array('required' => false)),
      'institution'       => new sfValidatorPass(array('required' => false)),
      'department'        => new sfValidatorPass(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'city'              => new sfValidatorPass(array('required' => false)),
      'country'           => new sfValidatorPass(array('required' => false)),
      'lang'              => new sfValidatorPass(array('required' => false)),
      'theme'             => new sfValidatorPass(array('required' => false)),
      'timezone'          => new sfValidatorPass(array('required' => false)),
      'firstaccess'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastaccess'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastlogin'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentlogin'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastip'            => new sfValidatorPass(array('required' => false)),
      'secret'            => new sfValidatorPass(array('required' => false)),
      'picture'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'url'               => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'descriptionformat' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mailformat'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'maildigest'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'maildisplay'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'htmleditor'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'autosubscribe'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'trackforums'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'timecreated'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timemodified'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trustbitmask'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'imagealt'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mdl_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MdlUser';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'auth'              => 'Text',
      'confirmed'         => 'Boolean',
      'policyagreed'      => 'Boolean',
      'deleted'           => 'Boolean',
      'suspended'         => 'Boolean',
      'mnethostid'        => 'Number',
      'username'          => 'Text',
      'password'          => 'Text',
      'idnumber'          => 'Text',
      'firstname'         => 'Text',
      'lastname'          => 'Text',
      'email'             => 'Text',
      'emailstop'         => 'Boolean',
      'icq'               => 'Text',
      'skype'             => 'Text',
      'yahoo'             => 'Text',
      'aim'               => 'Text',
      'msn'               => 'Text',
      'phone1'            => 'Text',
      'phone2'            => 'Text',
      'institution'       => 'Text',
      'department'        => 'Text',
      'address'           => 'Text',
      'city'              => 'Text',
      'country'           => 'Text',
      'lang'              => 'Text',
      'theme'             => 'Text',
      'timezone'          => 'Text',
      'firstaccess'       => 'Number',
      'lastaccess'        => 'Number',
      'lastlogin'         => 'Number',
      'currentlogin'      => 'Number',
      'lastip'            => 'Text',
      'secret'            => 'Text',
      'picture'           => 'Number',
      'url'               => 'Text',
      'description'       => 'Text',
      'descriptionformat' => 'Number',
      'mailformat'        => 'Boolean',
      'maildigest'        => 'Boolean',
      'maildisplay'       => 'Number',
      'htmleditor'        => 'Boolean',
      'autosubscribe'     => 'Boolean',
      'trackforums'       => 'Boolean',
      'timecreated'       => 'Number',
      'timemodified'      => 'Number',
      'trustbitmask'      => 'Number',
      'imagealt'          => 'Text',
    );
  }
}