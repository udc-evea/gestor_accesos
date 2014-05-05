<?php

/**
 * Faqconfig form base class.
 *
 * @method Faqconfig getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaqconfigForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'config_name'  => new sfWidgetFormInputHidden(),
      'config_value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'config_name'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getConfigName()), 'empty_value' => $this->getObject()->getConfigName(), 'required' => false)),
      'config_value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faqconfig[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faqconfig';
  }


}
