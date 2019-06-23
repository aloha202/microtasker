<?php

/**
 * register actions.
 *
 * @package    cms
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends myActions {

    public function preExecute() {
        $this->prepareModulePage(str_replace('Actions', '', __CLASS__));
        $this->getResponse()->setTitle($this->page->getMetaTitle());
    }

    public function executeIndex(sfWebRequest $request) {
        $this->form = new RegistrationForm;

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                return $this->redirect('register/registrationComplete');
            }
        }
    }

    public function executeRegistrationComplete() 
    {
        $this->redirectToSystemPage('registration_complete');
    }
    
    public function executeActivationSuccessful()
    {
        $this->redirectToSystemPage('activation_successful');        
    }

    public function executeActivate(sfWebRequest $request) {
        $code = $request->getParameter('code');
        $this->forward404Unless($code);

        $user = Doctrine::getTable('sfGuardUser')->findOneBySalt($code);
        $this->forward404Unless($user);

        $user->setIsActive(true);
        $user->save();
        $this->getUser()->signIn($user);

        return $this->redirect('register/activationSuccessful');
    }

}
