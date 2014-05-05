<?php



/**
 * Skeleton subclass for performing query and update operations on the 'faquserlogin' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class FaquserloginQuery extends BaseFaquserloginQuery
{
  /**
   * 
   * @param type $username
   * @return Faquserlogin
   */
  public function findUsuarioCompleto($username)
  {
    return $this
             ->joinWithFaquser()
             ->useFaquserQuery()
               ->filterByAuthSource('local')
             ->endUse()
             ->findOneByLogin($username);
  }
}
