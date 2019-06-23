<?php

/**
 * preset actions.
 *
 * @package    cms
 * @subpackage preset
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class presetActions extends myActions

{

  public function executeListMy(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    $this->processPage('preset_my');

    $q = Q::c('MicrotaskPreset', 'a')
        ->where('a.user_id = ?', $this->getUser()->getGuardUser()->getId());
    
    $this->pager = new sfDoctrinePager('MicrotaskPreset', 20);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeListUser(sfWebRequest $request)
  {
    $this->user = $this->getRoute()->getObject();  
    $this->processPage('preset_user', $this->user);

    $q = Q::c('MicrotaskPreset', 'a')
        ->where('a.user_id = ?', $this->user->getId());
    
    $this->pager = new sfDoctrinePager('MicrotaskPreset', 20);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->microtask_preset = $this->getRoute()->getObject();
    $this->processPage('preset_show', $this->microtask_preset);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->processPage('preset_new');  
    $this->form = new MicrotaskPresetForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MicrotaskPresetForm();

    $this->processForm2($this->form, $request);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
        $this->microtask_preset = $this->getRoute()->getObject();
        $this->forward404Unless($this->microtask_preset->isMy());
        $this->form = new MicrotaskPresetForm($this->microtask_preset);
        $this->processPage('preset_edit', $this->microtask_preset);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  
    $this->microtask_preset = $this->getRoute()->getObject();
    $this->forward404Unless($this->microtask_preset->isMy());    
    $this->form = new MicrotaskPresetForm($this->microtask_preset);

    $this->processForm2($this->form, $request,T::__('Объект успешно изменен'));

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->microtask_preset = $this->getRoute()->getObject();
    $this->forward404Unless($this->microtask_preset->isMy());
    $this->microtask_preset->delete();
    
    $this->redirect('preset/listMy');
  }
/* --- ACTIONS --- */
}
