<?php

/**
 * dev actions.
 *
 * @package    cms
 * @subpackage dev
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class devActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  {
      $this->forward404Unless($this->getRequest()->getHttpHeader('addr', 'remote') && sfConfig::get('sf_environment') == 'dev');      
  }
  public function executeIndex(sfWebRequest $request)
  {

  }
  
  public function executeUserLogin(sfWebRequest $request)
  {
      $user = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
      $this->forward404Unless($user);
      
      if($this->getUser()->isAuthenticated()){
          $this->getUser()->signOut();
      }
      $this->getUser()->signIn($user);
      return $this->renderText('ok');
  }
}
