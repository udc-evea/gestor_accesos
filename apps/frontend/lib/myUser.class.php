<?php

class myUser extends sfGuardSecurityUser
{
  public function setHashedValues($user, $pass)
  {
    $p = md5(rand(sfConfig::get('sf_csrf_secret', 'aaa')));
    $user = GibberishAES::enc($user, $p);
    $pass = GibberishAES::enc($pass, $p);
    
    $this->setAttribute('udc_hash_old', $user);
    $this->setAttribute('udc_hash_new', $pass);
    $this->setAttribute('udc_hash_plus', $p);
  }
}
