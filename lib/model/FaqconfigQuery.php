<?php



/**
 * Skeleton subclass for performing query and update operations on the 'faqconfig' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class FaqconfigQuery extends BaseFaqconfigQuery
{
  /**
   * 
   * @return String the salt value
   */
  public function getSaltConfiguration()
  {
    $config = $this
                ->filterByConfigName('security.salt')
                ->findOne();
    
    return $config->getConfigValue();
  }

}
