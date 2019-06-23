<?php

/**
 * report actions.
 *
 * @package    cms
 * @subpackage report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
		$this->processPage('reports');
		
		$this->Reports = Q::c('Report', 'r')
				->where('r.user_id = ?', $this->getUser()->getGuardUser()->id)
				->orderBy('r.created_at DESC')
				->execute()
				;
	}
	
	public function executeShow(sfWebRequest $request) {
		$this->Report = Q::f('Report', $request->getParameter('id'));
		$this->forward404Unless($this->Report && $this->Report->user_id == $this->getUser()->getGuardUser()->id);
		$this->getContext()->set('global_header', 'Отчет за ' . date('d.m.Y', strtotime($this->Report->created_at)));
		$this->Items = unserialize($this->Report->info);
	}

}
