<?php

/**
 * microtask actions.
 *
 * @package    cms
 * @subpackage microtask
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class microtaskActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeQuickadd(sfWebRequest $request) {
		$this->checkAdd();
		$task = $request->getParameter('microtask');
		if(!$task){
			$this->getUser()->setFlash('error', 'Не отправляйте пустое поле, все равно не добавлю');
			return $this->redirect($request->getReferer());
		}
		
		$Microtask = new Microtask;
		$Microtask->fromArray(array(
			'description' => $task
		));
		$pr = $request->getParameter('priority');
		switch($pr){
			case 'up':
				$max_pr = MicrotaskTable::getDashboardQuery('m')
					->select('MAX(m.priority)')
					->setHydrationMode(Doctrine::HYDRATE_SINGLE_SCALAR)
					->execute()
					;
				
				$Microtask->setPriority($max_pr ? $max_pr + 1 : 1);
				break;
			case 'blocker':
				$Microtask->setIsBlocker(true);
				break;
		}
		$Microtask->save();
		
		$this->getUser()->setFlash('notice', 'Таск добавлен, давай еще!');
		return $this->redirect($request->getReferer());		
		
	}
	
	public function executeComplete(sfWebRequest $request) {
		$Task = Q::f('Microtask', $request->getParameter('id'));
		$this->forward404Unless($Task && $Task->isMy());
		
		if($Task->isYoung()){
			$mins = MyConfig::getInteger('microtask_minimum_lifetime');
			$this->getUser()->setFlash('error', T::__("С момента создания задачи должно пройти $mins минут!"));
			return $this->redirect($request->getReferer());			
		}
		
		$Task->setStatus('success');
		$Task->save();
		
		if(!Mt::hasTasks()){
			Mt::unlockFillet();
		}
		
		$this->getUser()->setFlash('notice', T::__('Задание выполнено!'));
		return $this->redirect($request->getReferer());
	}
	
	public function executeBlocker(sfWebRequest $request) {
		$Task = Q::f('Microtask', $request->getParameter('id'));
		$this->forward404Unless($Task && $Task->isMy());
		
		$Task->setIsBlocker(true);
		$Task->save();
		
		$this->getUser()->setFlash('notice', T::__('Таск стал блокером!'));
		return $this->redirect($request->getReferer());		
	}
	
	public function executeFromPreset(sfWebRequest $request) {
		$this->checkAdd();
		$Preset = Q::f('MicrotaskPreset', $request->getParameter('id'));
		$this->forward404Unless($Preset && $Preset->isMy());
		$Microtask = new Microtask;
		$Microtask->fromPreset($Preset)
				->save();
		$this->getUser()->setFlash('notice', 'Таск добавлен, давай еще!');
		return $this->redirect($request->getReferer());				
		
		
	}
	
	protected function checkAdd() {
		if(Mt::is_fillet_locked()){
			return $this->backWithError('Цепочка заблокирована!');				
		}
		if(MicrotaskTable::hasBlocker()){
			return $this->backWithError('Есть блокирующая задача, добавление задач возможно только после ее завршения');
		}
		if(MicrotaskTable::isOpenTaskLimit()){
			return $this->backWithError('Вы достигли лимита задач. Чтобы добавить новую, вам нужно закрыть одну или несколько текущих');
		}		
		return true;
	}
	
	public function executeLockFillet(sfWebRequest $request) {
		Mt::lockFillet();
		$this->getUser()->setFlash('notice', 'Цепочка залочена! Вы не можете создавать новые задачи, пока не завершите все текущие!');
		return $this->redirect($request->getReferer());
	}
	
	public function executeFromBacklog(sfWebRequest $request) {
		$Backlog = Q::f('Backlog', $request->getParameter('id'));
		$this->forward404Unless($Backlog && $Backlog->isMy());
		$this->checkAdd();
		$Microtask = new Microtask;
		$Microtask->fromArray(array(
			'description' => $Backlog->description
		));		
		$Microtask->save();
		
		$Backlog->delete();
		
		$this->getUser()->setFlash('notice', 'Таск добавлен!');
		return $this->redirect('index/index');	
	}	
}
