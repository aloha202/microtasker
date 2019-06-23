<?php

require_once dirname(__FILE__).'/../lib/todo_sysGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/todo_sysGeneratorHelper.class.php';

/**
 * todo_sys actions.
 *
 * @package    cms
 * @subpackage todo_sys
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class todo_sysActions extends autoTodo_sysActions
{
	public function executeDone(sfWebRequest $request) {
		$todo = $this->getRoute()->getObject();
		$todo->setStatus('closed');
		$todo->save();
		
		$this->getUser()->setFlash('notice', 'Сделано!');
		return $this->redirect($request->getReferer());
	}
	
	public function executeReturn(sfWebRequest $request) {
		$todo = $this->getRoute()->getObject();
		$todo->setStatus('open');
		$todo->save();
		
		$this->getUser()->setFlash('notice', 'Возвращено');
		return $this->redirect($request->getReferer());
	}	
}
