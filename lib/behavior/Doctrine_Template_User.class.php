<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doctrine_Template_Meta
 *
 * @author Алекс
 */
class Doctrine_Template_User extends Doctrine_Template{
   
    protected $_options = array(
        'apps' => array('frontend', 'site')
    );
    
    public function setTableDefinition()
    {
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));      
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));        

        
        $this->addListener(new Doctrine_Template_User_Listener($this->_options));        
    }    
    
    public function isMy()
    {
        $object = $this->getInvoker();
        if(sfContext::getInstance()->getUser()->isAuthenticated()){
            return $object->getUserId() == sfContext::getInstance()->getUser()->getGuardUser()->getId();
        }
        return false;
    }
    
    
}
