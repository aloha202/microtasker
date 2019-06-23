<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySecurityFilter
 *
 * @author Alaxa
 */
class MySecurityFilter extends sfGuardBasicSecurityFilter {

	public function execute($filterChain) {
		
		$module = $this->context->getModuleName();
		if(in_array($module, sfConfig::get('app_auth_insecure_modules'))){
			$filterChain->execute();
		}else{
			parent::execute($filterChain);
		}
	}

}