<?php

/**
 * BaseMicrotaskPreset
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $description
 * @property enum $type
 * 
 * @method string          getDescription() Returns the current record's "description" value
 * @method enum            getType()        Returns the current record's "type" value
 * @method MicrotaskPreset setDescription() Sets the current record's "description" value
 * @method MicrotaskPreset setType()        Sets the current record's "type" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMicrotaskPreset extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('microtask_preset');
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'down',
              1 => 'up',
              2 => 'blocker',
             ),
             'default' => 'down',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $user0 = new Doctrine_Template_User(array(
             ));
        $this->actAs($user0);
    }
}