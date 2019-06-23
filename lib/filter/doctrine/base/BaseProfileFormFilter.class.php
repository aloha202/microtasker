<?php

/**
 * Profile filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'            => new sfWidgetFormFilterInput(),
      'last_name'             => new sfWidgetFormFilterInput(),
      'image'                 => new sfWidgetFormFilterInput(),
      'dob'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'email'                 => new sfWidgetFormFilterInput(),
      'phone'                 => new sfWidgetFormFilterInput(),
      'about'                 => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'geo_lat'               => new sfWidgetFormFilterInput(),
      'geo_lng'               => new sfWidgetFormFilterInput(),
      'geo_country'           => new sfWidgetFormFilterInput(),
      'geo_city'              => new sfWidgetFormFilterInput(),
      'geo_address'           => new sfWidgetFormFilterInput(),
      'geo_address_formatted' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'first_name'            => new sfValidatorPass(array('required' => false)),
      'last_name'             => new sfValidatorPass(array('required' => false)),
      'image'                 => new sfValidatorPass(array('required' => false)),
      'dob'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'phone'                 => new sfValidatorPass(array('required' => false)),
      'about'                 => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'geo_lat'               => new sfValidatorPass(array('required' => false)),
      'geo_lng'               => new sfValidatorPass(array('required' => false)),
      'geo_country'           => new sfValidatorPass(array('required' => false)),
      'geo_city'              => new sfValidatorPass(array('required' => false)),
      'geo_address'           => new sfValidatorPass(array('required' => false)),
      'geo_address_formatted' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'user_id'               => 'ForeignKey',
      'first_name'            => 'Text',
      'last_name'             => 'Text',
      'image'                 => 'Text',
      'dob'                   => 'Date',
      'email'                 => 'Text',
      'phone'                 => 'Text',
      'about'                 => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'geo_lat'               => 'Text',
      'geo_lng'               => 'Text',
      'geo_country'           => 'Text',
      'geo_city'              => 'Text',
      'geo_address'           => 'Text',
      'geo_address_formatted' => 'Text',
    );
  }
}
