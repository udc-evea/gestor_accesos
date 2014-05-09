<?php

/**
 * WpUsermeta form base class.
 *
 * @method WpUsermeta getObject() Returns the current form's model object
 *
 * @package    symfony1-baseproject
 * @subpackage form
 * @author     mppfiles
 */
abstract class BaseWpUsermetaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'umeta_id'   => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'WpUsers', 'add_empty' => false)),
      'meta_key'   => new sfWidgetFormInputText(),
      'meta_value' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'umeta_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getUmetaId()), 'empty_value' => $this->getObject()->getUmetaId(), 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'WpUsers', 'column' => 'ID')),
      'meta_key'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_value' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wp_usermeta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WpUsermeta';
  }


}
