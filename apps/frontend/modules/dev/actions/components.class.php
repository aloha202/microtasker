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
class devComponents extends sfComponents{
    
    public function executeDev()
    {        
    }
    
    public function executeUsers()
    {
        $this->users = Doctrine::getTable('sfGuardUser')
                ->createQuery('u')
                ->execute()
                ;
        
    }
    
}
