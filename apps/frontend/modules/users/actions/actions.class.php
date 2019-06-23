<?php

/**
 * users actions.
 *
 * @package    cms
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends myActions {

    public function preExecute() {
        $this->processPage('users');
    }

    public function executeIndex(sfWebRequest $request) {
        $this->processPage();
        $this->profiles = Doctrine_Core::getTable('Profile')
                ->createQuery('a')
                ->select('a.*, a.User.last_login last_login')
                ->where('a.User.is_active = ?', true)
                ->orderBy('last_login DESC')
                ->execute();
    }

    public function executeShow(sfWebRequest $request) {
        $this->profile = $this->getRoute()->getObject();
        $this->processPage(false, $this->profile);        
        $this->forward404Unless($this->profile);
        Breadcrumbs::add(array($this->profile));
        //$this->getResponse()->addTitle($this->profile->getMetaTitle());      
    }

    public function executeShowMap(sfWebRequest $request)
    {
        $this->profile = $this->getRoute()->getObject();
        $this->processPage('users_show_map', $this->profile);        
    }

/* --- ACTIONS --- */
}
