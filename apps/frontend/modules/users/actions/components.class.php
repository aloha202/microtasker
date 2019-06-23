<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Alaxa
 */
class usersComponents extends sfComponents {

    public function executeMenu() {
        $this->menu = $this->getMenu();
        foreach($this->menu as &$item){
            if(sfContext::getInstance()->getRouting()->getCurrentRouteName() == $item[1]){
                $item[2]['class'] = 'active';
            }
        }        
    }
    
protected function getMenu()
    {
        return myCache::getYaml(dirname(__FILE__) . '/../config/menu.yml');
    }    

}