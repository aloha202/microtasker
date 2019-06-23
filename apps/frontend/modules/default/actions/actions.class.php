<?php

/**
 * default actions.
 *
 * @package    cms
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */


	public function executeVisit(sfWebRequest $request) {
		$url = $request->getParameter('url');
		SiteVisit::processUrl($url);

		$src = sfConfig::get('sf_web_dir') . '/images/visit.gif';
		header('Content-Type: image/jpg');
		header('Content-length: ' . filesize($src));
		readfile($src);
		die;
	}

	public function executeError404() {
		Redirect301::process();
		Notifier::notify(404, 'Ошибка 404');
		$this->processPage('error404');
		$this->displayPage();
	}

	public function executeIpBanned() {
		$this->processPage('ip_banned');
	}

}
