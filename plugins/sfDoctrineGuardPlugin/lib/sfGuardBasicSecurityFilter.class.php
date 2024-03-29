<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Processes the "remember me" cookie.
 * 
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardBasicSecurityFilter.class.php 27166 2010-01-25 21:04:41Z Kris.Wallsmith $
 * 
 * @deprecated Use {@link sfGuardRememberMeFilter} instead
 */
class sfGuardBasicSecurityFilter extends sfBasicSecurityFilter
{
  /**
   * Executes the filter chain.
   *
   * @param sfFilterChain $filterChain
   */
  public function execute($filterChain)
  {
    $cookieName = sfConfig::get('app_sf_guard_plugin_remember_cookie_name', 'sfRemember');
	
	
    if ($this->isFirstCall())
    {

      if (
        $this->context->getUser()->isAnonymous()
        &&
        $cookie = $this->context->getRequest()->getCookie($cookieName)
      )
      {
        $q = Doctrine_Core::getTable('sfGuardRememberKey')->createQuery('r')
              ->innerJoin('r.User u')
              ->where('r.remember_key = ?', $cookie);

        if ($q->count())
        {
	      $RemKey = $q->fetchOne();
		  if($RemKey->getUser()->getIsActive()){
			$this->context->getUser()->signIn($RemKey->getUser(), true);
		  }
		  $RemKey->delete();
        }
      }
    }
	
    parent::execute($filterChain);
  }
}