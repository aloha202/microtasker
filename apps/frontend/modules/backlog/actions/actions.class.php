<?php

/**
 * backlog actions.
 *
 * @package    cms
 * @subpackage backlog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class backlogActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
		$this->Backlogs = Q::c('Backlog', 'b')
				->where('b.user_id = ?', $this->getUser()->getGuardUser()->id)
				->execute()
				;
	}
	
	public function executeAdd(sfWebRequest $request) {
		$descr = trim($request->getParameter('description'));
		if(!$descr){
			return $this->backWithError('Заполните поле');
		}
		
		$Bl = new Backlog;
		$Bl->description = $descr;
		$Bl->save();
		return $this->backWithNotice('Backlog создан успешно');
	}
	


}
