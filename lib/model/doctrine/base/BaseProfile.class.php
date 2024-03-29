<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Profile', 'doctrine');

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $image
 * @property date $dob
 * @property string $email
 * @property string $phone
 * @property string $about
 * @property sfGuardUser $User
 * 
 * @method integer     getUserId()     Returns the current record's "user_id" value
 * @method string      getFirstName()  Returns the current record's "first_name" value
 * @method string      getLastName()   Returns the current record's "last_name" value
 * @method string      getImage()      Returns the current record's "image" value
 * @method date        getDob()        Returns the current record's "dob" value
 * @method string      getEmail()      Returns the current record's "email" value
 * @method string      getPhone()      Returns the current record's "phone" value
 * @method string      getAbout()      Returns the current record's "about" value
 * @method sfGuardUser getUser()       Returns the current record's "User" value
 * @method Profile     setUserId()     Sets the current record's "user_id" value
 * @method Profile     setFirstName()  Sets the current record's "first_name" value
 * @method Profile     setLastName()   Sets the current record's "last_name" value
 * @method Profile     setImage()      Sets the current record's "image" value
 * @method Profile     setDob()        Sets the current record's "dob" value
 * @method Profile     setEmail()      Sets the current record's "email" value
 * @method Profile     setPhone()      Sets the current record's "phone" value
 * @method Profile     setAbout()      Sets the current record's "about" value
 * @method Profile     setUser()       Sets the current record's "User" value
 * 
 * @package    cms
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('dob', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('about', 'string', null, array(
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

        $imagebuilder0 = new Doctrine_Template_ImageBuilder();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $geo0 = new Doctrine_Template_Geo(array(
             'engine' => 'google',
             ));
        $this->actAs($imagebuilder0);
        $this->actAs($timestampable0);
        $this->actAs($geo0);
    }
}