<?php

class myUser extends sfGuardSecurityUser
{
  public function setHashedValues($user, $pass)
  {
    $user = $this->getGuardUser()->getGba($user);
    $pass = $this->getGuardUser()->getGba($pass);
    
    $this->setAttribute('udc_hash_old', $user);
    $this->setAttribute('udc_hash_new', $pass);
    $this->setAttribute('udc_hash_plus', $this->getGuardUser()->getSecret());
  }
}
