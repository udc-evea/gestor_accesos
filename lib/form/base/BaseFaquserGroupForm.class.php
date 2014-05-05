<?php

/**
 * FaquserGroup form base class.
 *
 * @method FaquserGroup getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseFaquserGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'  => new sfWidgetFormInputHidden(),
      'group_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getUserId()), 'empty_value' => $this->getObject()->getUserId(), 'required' => false)),
      'group_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getGroupId()), 'empty_value' => $this->getObject()->getGroupId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faquser_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FaquserGroup';
  }


}
