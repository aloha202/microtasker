<?php

/**
 * oauth actions.
 *
 * @package    cms
 * @subpackage oauth
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class oauthActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    
    public function executeOauth(sfWebRequest $request) {
        $type = $request->getParameter('type');
        try{
            $oauth = new Dev2OAuth($type);
            if ($code = $request->getParameter($oauth->getCodeParameterName())) {
                $token = $oauth->getAccessToken($code);
                $profile = $oauth->getUserProfile($token);
                $signin = $oauth->signin($profile);
                if($signin == 'bridge'){
                    return $this->redirect('@oauth_bridge');
                }
                return $this->forward('oauth', 'redirect');
            }else{
                return $this->redirect($oauth->getLoginUrl());
            }
        }catch(Exception $e){
            $request->setParameter('oauth_error_exception', $e);
            return $this->forward('oauth', 'error');
        }
    }
    
    public function executeBridge(sfWebRequest $request) {
        $this->bridge = $this->getSocialBridge($request);
        $this->processPage();
        if ($request->isMethod('post')) {
            if ($request->hasParameter('confirm')) {
                $this->bridge->userConfirmEmail();
                return $this->redirect('@oauth_bridge_confirm');
            }
        }
    }

    public function executeBridgeConfirm(sfWebRequest $request) {
        $this->bridge = $this->getSocialBridge($request);        
        $this->processPage();
        if ($token = $request->getParameter('token')) {
            if ($this->bridge->getToken() == $token) {
                $this->bridge->confirmToken();
                return $this->forward('oauth', 'redirect');
            }
            $this->bridge->delete();
            $this->getUser()->setFlash('error', 'Неверный код подтверждения');
            return $this->redirect('@homepage');
        }
        /* --- FbBridgeConfirm ADDCODE --- */
    }    
    
    protected function getSocialBridge($request) {
        $this->forward404Unless($bridge_id = $this->getUser()->getAttribute('social_bridge_id'));
        $this->forward404Unless($bridge = Q::f('SocialBridge', $bridge_id));
        if ($bridge->getStatus() == 'closed') {
            return $this->forward('oauth', 'redirect');
        }
        return $bridge;
    }    

    
    public function executeError(sfWebRequest $request)
    {
        $this->e = $request->getParameter('oauth_error_exception');
        $this->processPage();
    }
    

    
    public function executeRedirect()
    {
        return $this->redirect('@homepage');
    }
}
