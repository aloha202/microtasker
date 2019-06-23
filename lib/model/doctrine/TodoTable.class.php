<?php

/**
 * TodoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TodoTable extends Doctrine_Table {

	/**
	 * Returns an instance of this class.
	 *
	 * @return object TodoTable
	 */
	public static function getInstance() {
		return Doctrine_Core::getTable('Todo');
	}

	public static function tmList(Doctrine_Query $q) {
		$a = $q->getRootAlias();
		$q->orderBy("$a.status DESC, $a.created_at DESC");
		return $q;
	}

}