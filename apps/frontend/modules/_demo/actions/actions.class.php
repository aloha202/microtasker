<?php

/**
 * _demo actions.
 *
 * @package    cms
 * @subpackage _demo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class _demoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }
    
    public function executeLang(sfWebRequest $request)
    {
        $lang = $request->getParameter('lang');
        $langs = sfConfig::get('app_langs_all');
        if(!isset($langs[$lang])){
            return $this->redirect($request->getReferer());
        }
        $_SESSION['lang'] = $lang;
      //  $this->getUser()->signOut();
        return $this->redirect($request->getReferer());
    }    

}
