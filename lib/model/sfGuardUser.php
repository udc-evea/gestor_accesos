<?php



/**
 * Skeleton subclass for representing a row from the 'sf_guard_user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class sfGuardUser extends PluginsfGuardUser
{
  public function getDni() {
     $perfil = $this->getPerfil();
    
    return (!$perfil) ? "completar perfil" : $perfil->getDni();
  }
  
  public function getApeynom() {
     $perfil = $this->getPerfil();
    
    return (!$perfil) ? "completar perfil" : $perfil->getApeynom();
  }
  
  public function getPerfil()
  {
    return SfGuardUserProfileQuery::create()->findOneByUserId($this->getPrimaryKey());
  }
  
  public function getSecret()
  {
    return md5(sfConfig::get('sf_csrf_secret', 'aaa'));
  }
  
  public function getGba($string)
  {
    $res = GibberishAES::enc($string, $this->getSecret());
    
    return $res;
  }

  public function getPasswordPlain() 
  {
    $pass = $this->getPasswordGba();
    $pass = GibberishAES::dec($pass, $this->getSecret());
    
    return $pass;
  }

}
