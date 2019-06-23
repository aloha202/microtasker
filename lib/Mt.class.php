<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mt
 *
 * @author Alaxa
 */
final class Mt {
	public static function is_fillet_locked(){
		return sfContext::getInstance()->getUser()->getGuardUser()->getSettings()->getIsFilletLocked();
	}	
	
	public static function hasTasks() {
		return MicrotaskTable::getDashboardQuery()->count();
	}


	public static function unlockFillet() {
		sfContext::getInstance()->getUser()->getGuardUser()->getSettings()->setIsFilletLocked(false)
				->save();
	}
	
	public static function lockFillet() {
		if(self::hasTasks()){
			sfContext::getInstance()->getUser()->getGuardUser()->getSettings()->setIsFilletLocked(true)
					->save();
		}
	}	
}