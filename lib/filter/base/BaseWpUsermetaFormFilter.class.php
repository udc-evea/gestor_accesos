<?php

/**
 * WpUsermeta filter form base class.
 *
 * @package    symfony1-baseproject
 * @subpackage filter
 * @author     mppfiles
 */
abstract class BaseWpUsermetaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'WpUsers', 'add_empty' => true)),
      'meta_key'   => new sfWidgetFormFilterInput(),
      'meta_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WpUsers', 'column' => 'ID')),
      'meta_key'   => new sfValidatorPass(array('required' => false)),
      'meta_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wp_usermeta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WpUsermeta';
  }

  public function getFields()
  {
    return array(
      'umeta_id'   => 'Number',
      'user_id'    => 'ForeignKey',
      'meta_key'   => 'Text',
      'meta_value' => 'Text',
    );
  }
}
