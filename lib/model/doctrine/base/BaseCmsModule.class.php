<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CmsModule', 'doctrine');

/**
 * BaseCmsModule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property boolean $is_active
 * @property string $model
 * @property string $model_sitemap_callback
 * @property string $show_route
 * 
 * @method string    getName()                   Returns the current record's "name" value
 * @method boolean   getIsActive()               Returns the current record's "is_active" value
 * @method string    getModel()                  Returns the current record's "model" value
 * @method string    getModelSitemapCallback()   Returns the current record's "model_sitemap_callback" value
 * @method string    getShowRoute()              Returns the current record's "show_route" value
 * @method CmsModule setName()                   Sets the current record's "name" value
 * @method CmsModule setIsActive()               Sets the current record's "is_active" value
 * @method CmsModule setModel()                  Sets the current record's "model" value
 * @method CmsModule setModelSitemapCallback()   Sets the current record's "model_sitemap_callback" value
 * @method CmsModule setShowRoute()              Sets the current record's "show_route" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCmsModule extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cms_module');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('model', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('model_sitemap_callback', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('show_route', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}