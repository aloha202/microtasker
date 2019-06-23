<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myUserBase
 *
 * @author Alaxa
 */
class myUserBase extends sfGuardSecurityUser{
	public function isDemoEditor() {
		return $this->isAuthenticated()
				&& $this->hasCredential('editor');
	}

	public function signIn($user, $remember = false, $con = null) {
		parent::signIn($user, $remember, $con);

		$visit = SiteVisit::executeVisit();
		$visit->setUserId($user->getId());
		$visit->save();
	}

	public function getSigninRedirect() {
		$redirect = $this->getAttribute('signin_redirect');
		$this->setAttribute('signin_redirect', null);
		return $redirect;
	}

	public function setSigninRedirect($redirect) {
		$this->setAttribute('signin_redirect', $redirect);
	}

	public function getProcessFormRedirect($form_class) {
		$redirect = $this->getAttribute($form_class . '_redirect');
		$this->setAttribute($form_class . '_redirect', null);
		return $redirect;
	}

	public function setProcessFormRedirect($form_class, $redirect) {
		$this->setAttribute($form_class . '_redirect', $redirect);
	}
}