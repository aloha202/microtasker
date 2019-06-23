<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Алекс
 */
class profileComponents extends sfComponents{
    
    public function executeMenu()
    {
        $this->menu = $this->getMenu();
        foreach($this->menu as &$item){
            if($this->getContext()->getActionName() == $item[1]){
                $item[2]['class'] = 'active';
            }
        }
        
    }
    
    protected function getMenu()
    {
        return myCache::getYaml(dirname(__FILE__) . '/../config/menu.yml');
    }
    
}
