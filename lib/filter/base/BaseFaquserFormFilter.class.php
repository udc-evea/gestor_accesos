<?php

/**
 * Faquser filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseFaquserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'login'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'session_id'        => new sfWidgetFormFilterInput(),
      'session_timestamp' => new sfWidgetFormFilterInput(),
      'ip'                => new sfWidgetFormFilterInput(),
      'account_status'    => new sfWidgetFormFilterInput(),
      'last_login'        => new sfWidgetFormFilterInput(),
      'auth_source'       => new sfWidgetFormFilterInput(),
      'member_since'      => new sfWidgetFormFilterInput(),
      'remember_me'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'login'             => new sfValidatorPass(array('required' => false)),
      'session_id'        => new sfValidatorPass(array('required' => false)),
      'session_timestamp' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip'                => new sfValidatorPass(array('required' => false)),
      'account_status'    => new sfValidatorPass(array('required' => false)),
      'last_login'        => new sfValidatorPass(array('required' => false)),
      'auth_source'       => new sfValidatorPass(array('required' => false)),
      'member_since'      => new sfValidatorPass(array('required' => false)),
      'remember_me'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquser_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquser';
  }

  public function getFields()
  {
    return array(
      'user_id'           => 'Number',
      'login'             => 'Text',
      'session_id'        => 'Text',
      'session_timestamp' => 'Number',
      'ip'                => 'Text',
      'account_status'    => 'Text',
      'last_login'        => 'Text',
      'auth_source'       => 'Text',
      'member_since'      => 'Text',
      'remember_me'       => 'Text',
    );
  }
}
