<?php

/**
 * BaseReport
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $microtask_count
 * @property string $info
 * @property sfGuardUser $User
 * 
 * @method integer     getUserId()          Returns the current record's "user_id" value
 * @method integer     getMicrotaskCount()  Returns the current record's "microtask_count" value
 * @method string      getInfo()            Returns the current record's "info" value
 * @method sfGuardUser getUser()            Returns the current record's "User" value
 * @method Report      setUserId()          Sets the current record's "user_id" value
 * @method Report      setMicrotaskCount()  Sets the current record's "microtask_count" value
 * @method Report      setInfo()            Sets the current record's "info" value
 * @method Report      setUser()            Sets the current record's "User" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReport extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('report');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('microtask_count', 'integer', null, array(
             'type' => 'integer',
             'unsigned' => true,
             ));
        $this->hasColumn('info', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}