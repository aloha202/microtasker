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
class CmsFilter extends sfFilter {

    public function execute($chain) {
        $user = sfContext::getInstance()->getUser();
        if($user->isAuthenticated()){
            sfContext::getInstance()->checkDemoConnection();
        }
        $cultures = sfConfig::get('app_langs_all_cultures');
        $user->setCulture(MyConfig::get('project_lang'));
        
        $chain->execute($chain);
    }

}
