<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Localization', 'doctrine');

/**
 * BaseLocalization
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $model
 * @property integer $pk
 * @property string $field
 * @property string $ru
 * @property string $en
 * @property string $de
 * @property string $es
 * @property string $it
 * @property string $fr
 * @property string $pt
 * @property string $sv
 * @property string $fi
 * @property string $no
 * @property string $nl
 * @property string $pl
 * 
 * @method string       getModel() Returns the current record's "model" value
 * @method integer      getPk()    Returns the current record's "pk" value
 * @method string       getField() Returns the current record's "field" value
 * @method string       getRu()    Returns the current record's "ru" value
 * @method string       getEn()    Returns the current record's "en" value
 * @method string       getDe()    Returns the current record's "de" value
 * @method string       getEs()    Returns the current record's "es" value
 * @method string       getIt()    Returns the current record's "it" value
 * @method string       getFr()    Returns the current record's "fr" value
 * @method string       getPt()    Returns the current record's "pt" value
 * @method string       getSv()    Returns the current record's "sv" value
 * @method string       getFi()    Returns the current record's "fi" value
 * @method string       getNo()    Returns the current record's "no" value
 * @method string       getNl()    Returns the current record's "nl" value
 * @method string       getPl()    Returns the current record's "pl" value
 * @method Localization setModel() Sets the current record's "model" value
 * @method Localization setPk()    Sets the current record's "pk" value
 * @method Localization setField() Sets the current record's "field" value
 * @method Localization setRu()    Sets the current record's "ru" value
 * @method Localization setEn()    Sets the current record's "en" value
 * @method Localization setDe()    Sets the current record's "de" value
 * @method Localization setEs()    Sets the current record's "es" value
 * @method Localization setIt()    Sets the current record's "it" value
 * @method Localization setFr()    Sets the current record's "fr" value
 * @method Localization setPt()    Sets the current record's "pt" value
 * @method Localization setSv()    Sets the current record's "sv" value
 * @method Localization setFi()    Sets the current record's "fi" value
 * @method Localization setNo()    Sets the current record's "no" value
 * @method Localization setNl()    Sets the current record's "nl" value
 * @method Localization setPl()    Sets the current record's "pl" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLocalization extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('localization');
        $this->hasColumn('model', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('pk', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('field', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 64,
             ));
        $this->hasColumn('ru', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('en', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('de', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('es', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('it', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('fr', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('pt', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('sv', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('fi', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('no', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('nl', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('pl', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));


        $this->index('main', array(
             'fields' => 
             array(
              0 => 'model',
              1 => 'pk',
              2 => 'field',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}