<?php

/**
 * Faquserdata form base class.
 *
 * @method Faquserdata getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaquserdataForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormInputHidden(),
      'last_modified' => new sfWidgetFormInputText(),
      'display_name'  => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorPropelChoice(array('model' => 'Faquser', 'column' => 'user_id', 'required' => false)),
      'last_modified' => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'display_name'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquserdata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquserdata';
  }


}
