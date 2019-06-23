<?php

/**
 * thread actions.
 *
 * @package    cms
 * @subpackage thread
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class threadActions extends myActions

{
  public function executeIndex(sfWebRequest $request)
  {
    $this->processPage('thread_index');

    $q = Q::c('Thread', 'a');
    
    $this->pager = new sfDoctrinePager('Thread', 20);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

  }

  public function executeListMy(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    $this->processPage('thread_my');

    $q = Q::c('Thread', 'a')
        ->where('a.user_id = ?', $this->getUser()->getGuardUser()->getId());
    
    $this->pager = new sfDoctrinePager('Thread', 20);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeListUser(sfWebRequest $request)
  {
    $this->user = $this->getRoute()->getObject();  
    $this->processPage('thread_user', $this->user);

    $q = Q::c('Thread', 'a')
        ->where('a.user_id = ?', $this->user->getId());
    
    $this->pager = new sfDoctrinePager('Thread', 20);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->thread = $this->getRoute()->getObject();
    $this->processPage('thread_show', $this->thread);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->processPage('thread_new');  
    $this->form = new ThreadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ThreadForm();

    $this->processForm2($this->form, $request);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
        $this->thread = $this->getRoute()->getObject();
        $this->forward404Unless($this->thread->isMy());
        $this->form = new ThreadForm($this->thread);
        $this->processPage('thread_edit', $this->thread);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  
    $this->thread = $this->getRoute()->getObject();
    $this->forward404Unless($this->thread->isMy());    
    $this->form = new ThreadForm($this->thread);

    $this->processForm2($this->form, $request,T::__('Объект успешно изменен'));

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->thread = $this->getRoute()->getObject();
    $this->forward404Unless($this->thread->isMy());
    $this->thread->delete();
    
    $this->redirect('thread/listMy');
  }
/* --- ACTIONS --- */
}
