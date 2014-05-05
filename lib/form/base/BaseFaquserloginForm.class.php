<?php

/**
 * Faquserlogin form base class.
 *
 * @method Faquserlogin getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaquserloginForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'login' => new sfWidgetFormInputHidden(),
      'pass'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'login' => new sfValidatorPropelChoice(array('model' => 'Faquser', 'column' => 'login', 'required' => false)),
      'pass'  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquserlogin[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faquserlogin';
  }


}
