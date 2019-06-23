<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sfCmsTestTask
 *
 * @author Алекс
 */
class sfMtReportTask extends sfBaseTask {

	protected function configure() {
		$this->namespace = 'mt';
		$this->name = 'report';
	}

	protected function execute($arguments = array(), $options = array()) {
		$day = 7; //Sunday
		if (date('N') == $day) {
			$databaseManager = new sfDatabaseManager($this->configuration);
			$q = Doctrine_Query::create()
					->select('distinct(user_id) user_id')
					->from('Microtask')
					->where('is_reported = ?', false)
					->addWhere('status = ?', Microtask::STATUS_SUCCESS)
					->addWhere('DATE(updated_at) < ?', date('Y-m-d'))
			;
			$Microtask = $q->fetchOne();
			if ($Microtask) {
				$Report = new Report();
				$Report->user_id = $Microtask->user_id;
				$Microtasks = Q::c('Microtask', 'm')
						->where('m.is_reported = ?', false)
						->addWhere('m.user_id = ?', $Microtask->user_id)
						->addWhere('m.status = ?', Microtask::STATUS_SUCCESS)
						->addWhere('DATE(m.updated_at) < ?', date('Y-m-d'))
						->orderBy('m.updated_at')
						->execute();
				$Report->microtask_count = $Microtasks->count();
				$Info = array();
				foreach ($Microtasks as $Mt) {
					$Info[] = array('completed_at' => $Mt->updated_at, 'description' => $Mt->description);
				}
				$Report->info = serialize($Info);
				$Report->save();

				Q::c('Microtask', 'm')
						->whereIn('m.id', $Microtasks->getPrimaryKeys())
						->update()
						->set('is_reported', true)
						->execute()
				;
				$this->logSection('mt', "Report for user $Report->user_id created, $Report->microtask_count microtasks processed");
			} else {
				$this->logSection('mt', 'done');
			}
		}else{
			$this->logSection('mt', 'Wait untill Sunday');
		}
	}

}
