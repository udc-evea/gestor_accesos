<?php

class mpGuardFormSignin extends PluginsfGuardFormSignin
{
  public function configure()
  {
    parent::configure();
    
    $this->widgetSchema->setLabels(array(
       'username'  => 'Usuario',
        'password' => 'Contraseña' 
    ));
  }
}
