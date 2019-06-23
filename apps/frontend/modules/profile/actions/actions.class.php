<?php

/**
 * profile actions.
 *
 * @package    cms
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute()
    {
        $this->profile = $this->getUser()->getGuardUser()->getProfile();        
    }
    
    public function executeIndex(sfWebRequest $request) {
        $this->form = new ProfileForm($this->profile);
        $this->processPage();

        $this->processForm2($this->form, $request, 'Данные сохранены');
    }

    public function executePassword(sfWebRequest $request) {
        $this->form = new ProfileFormPassword($this->getUser()->getGuardUser());
        $this->processPage();

        $this->processForm2($this->form, $request);
    }
    
    public function executeAvatar(sfWebRequest $request) {
        $this->form = new ProfileFormAvatar($this->profile);
        $this->processPage();
        $this->processForm2($this->form, $request, 'Данные сохранены');
    }       
    
    public function executeAvatarDelete(sfWebRequest $request)
    {
        $this->profile->deleteImage();
        $this->getUser()->setFlash('notice', 'Изображение удалено');
        return $this->redirect($request->getReferer());
    }    

    public function executeGmaps(sfWebRequest $request) {
        $this->processPage();
        $this->form = new ProfileFormGmaps($this->profile);
        $this->processForm2($this->form, $request);
    }

    public function executeSaved(sfWebRequest $request) {
        $this->page = $this->pageByModuleAction();        
        Breadcrumbs::add($this->page);        
    }

}
