<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CmsFilter
 *
 * @author Алекс
 */
class FrontendFilter extends sfFilter {

	public function execute($chain) {
		sfContext::getInstance()->checkDemoConnection();
		if (P::is_live()) {
			//   if(sfContext::getInstance()->getModuleName() != 'blog'){
			//       sfContext::getInstance()->getController()->redirect('blog/index');
			//   }
		}

		$User = sfContext::getInstance()->getUser();


		$User->setCulture('ru_RU');


		if (P::isIpBanned()){
		//	P::forward_banned_ip();
			
		}

		$chain->execute($chain);
	}

}
