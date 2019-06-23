<?php

/**
 * contactus actions.
 *
 * @package    eurofuels
 * @subpackage contactus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactusActions extends myActions
{
  public function preExecute()
  {
      $this->prepareModulePage(str_replace('Actions', '', __CLASS__));
      $this->getResponse()->setTitle($this->page->getMetaTitle());
  }
  public function executeIndex(sfWebRequest $request)
  {
     
      $this->page = $this->processPage();
      $this->form = new ContactusForm;
      
      if($request->isMethod('post')){
          $this->form->bind($request->getParameter($this->form->getName()));
          
          if($this->form->isValid()){
              $this->form->save();
              
              $this->getUser()->setFlash('notice', 'Сообщение отправлено!');
              if($request->isXmlHttpRequest()){
                return $this->renderPartial('contactus/message_sent');
              }else{
                return $this->redirect($request->getReferer());
              }
          }
          if($request->isXmlHttpRequest()){
              return $this->renderPartial('contactus/form', array('form' => $this->form)); 
          }
      }
  }
}
