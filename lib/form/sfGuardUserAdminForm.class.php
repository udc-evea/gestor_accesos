<?php

/**
 * sfGuardUser form for admin.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 13000 2008-11-14 10:44:57Z noel $
 */
class sfGuardUserAdminForm extends PluginsfGuardUserAdminForm
{

  public function configure()
  {
    parent::configure();
    unset($this['password_gba']);
  }
  
  public function updateObject($values = null) {
    
    $values = $this->getValues();
    if(isset($values['password']))
    {
      $gba = $this->getObject()->getGba($values['password']);
      $this->getObject()->setPasswordGba($gba);
    }
    
    return parent::updateObject($values);
  }
}
