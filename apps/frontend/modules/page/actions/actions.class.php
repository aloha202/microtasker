<?php

/**
 * page actions.
 *
 * @package    eurofuels
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeShow(sfWebRequest $request) {
        if($request->hasParameter('__page')){
            $this->page = $request->getParameter('__page');
        }
        if(!is_object($this->page)){
            $this->page = $this->getRoute()->getObject();
        }
        if($this->page->getIsModulePage()){
            return $this->forward($this->page->getModuleName(), 'index');
        }    
        if($this->page->isSecure())
        {
            if(!$this->getUser()->isAuthenticated())
                $this->forward('auth', 'secure');
        }
        $this->processPage($this->page);
    }

}
