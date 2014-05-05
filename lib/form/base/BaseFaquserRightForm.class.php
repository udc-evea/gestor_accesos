<?php

/**
 * FaquserRight form base class.
 *
 * @method FaquserRight getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaquserRightForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'  => new sfWidgetFormInputHidden(),
      'right_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getUserId()), 'empty_value' => $this->getObject()->getUserId(), 'required' => false)),
      'right_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getRightId()), 'empty_value' => $this->getObject()->getRightId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquser_right[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaquserRight';
  }


}
