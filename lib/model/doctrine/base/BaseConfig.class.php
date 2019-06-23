<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Config', 'doctrine');

/**
 * BaseConfig
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $title
 * @property string $value
 * @property string $help
 * @property enum $display
 * @property enum $section
 * @property enum $type
 * @property string $type_enum_values
 * @property boolean $use_wysiwyg
 * @property boolean $is_localized
 * 
 * @method string  getName()             Returns the current record's "name" value
 * @method string  getTitle()            Returns the current record's "title" value
 * @method string  getValue()            Returns the current record's "value" value
 * @method string  getHelp()             Returns the current record's "help" value
 * @method enum    getDisplay()          Returns the current record's "display" value
 * @method enum    getSection()          Returns the current record's "section" value
 * @method enum    getType()             Returns the current record's "type" value
 * @method string  getTypeEnumValues()   Returns the current record's "type_enum_values" value
 * @method boolean getUseWysiwyg()       Returns the current record's "use_wysiwyg" value
 * @method boolean getIsLocalized()      Returns the current record's "is_localized" value
 * @method Config  setName()             Sets the current record's "name" value
 * @method Config  setTitle()            Sets the current record's "title" value
 * @method Config  setValue()            Sets the current record's "value" value
 * @method Config  setHelp()             Sets the current record's "help" value
 * @method Config  setDisplay()          Sets the current record's "display" value
 * @method Config  setSection()          Sets the current record's "section" value
 * @method Config  setType()             Sets the current record's "type" value
 * @method Config  setTypeEnumValues()   Sets the current record's "type_enum_values" value
 * @method Config  setUseWysiwyg()       Sets the current record's "use_wysiwyg" value
 * @method Config  setIsLocalized()      Sets the current record's "is_localized" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfig extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('config');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('value', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('help', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('display', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'user',
              1 => 'system',
             ),
             ));
        $this->hasColumn('section', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'settings',
              1 => 'dictionary',
              2 => 'system',
              3 => 'wiki',
             ),
             'default' => 'settings',
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'integer',
              1 => 'float',
              2 => 'boolean',
              3 => 'text',
              4 => 'enum',
             ),
             'default' => 'text',
             ));
        $this->hasColumn('type_enum_values', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('use_wysiwyg', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_localized', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}