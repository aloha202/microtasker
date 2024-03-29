<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SiteEvent', 'doctrine');

/**
 * BaseSiteEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $type
 * @property string $description
 * @property string $admin_email
 * @property string $user_email
 * 
 * @method string    getType()        Returns the current record's "type" value
 * @method string    getDescription() Returns the current record's "description" value
 * @method string    getAdminEmail()  Returns the current record's "admin_email" value
 * @method string    getUserEmail()   Returns the current record's "user_email" value
 * @method SiteEvent setType()        Sets the current record's "type" value
 * @method SiteEvent setDescription() Sets the current record's "description" value
 * @method SiteEvent setAdminEmail()  Sets the current record's "admin_email" value
 * @method SiteEvent setUserEmail()   Sets the current record's "user_email" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSiteEvent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('site_event');
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('admin_email', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('user_email', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $backendviewed0 = new Doctrine_Template_BackendViewed(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($backendviewed0);
    }
}