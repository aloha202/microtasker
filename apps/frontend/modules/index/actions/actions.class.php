<?php

/**
 * index actions.
 *
 * @package    cms
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class indexActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
		//$this->page = $this->pageBySpecialMark();
		$this->processPage();
		if (MicrotaskTable::hasBlocker()) {
			$this->Tasks = MicrotaskTable::getDashboardQuery('m')->addWhere('m.is_blocker = ?', true)->execute();
		} else {
			$this->Tasks = MicrotaskTable::getDashboardQuery()->execute();
		}

		$this->Presets = MicrotaskPresetTable::getDashboardQuery()->execute();
	}

}
