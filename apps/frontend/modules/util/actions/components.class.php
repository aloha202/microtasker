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
class utilComponents extends sfComponents{
    
    public function executeNew_messages_count()
    {
        $this->module = isset($this->module) ? $this->module : sfInflector::underscore($this->model);
        $this->count = Q::c($this->model, 'a')
            ->where('a.is_backend_viewed = ?', false)
            ->count();
    }
    
}