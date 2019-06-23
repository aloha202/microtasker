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
class newsComponents extends sfComponents{
    
    public function executeIndex()
    {
        $this->news = Doctrine::getTable('News')
                ->createQuery('n')
                //->where('n.image')
                ->orderBy('n.date DESC')
                ->fetchOne();
    }
    
}
