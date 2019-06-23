<?php

/**
 * SiteEvent filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSiteEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'              => new sfWidgetFormFilterInput(),
      'description'       => new sfWidgetFormFilterInput(),
      'admin_email'       => new sfWidgetFormFilterInput(),
      'user_email'        => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'is_backend_viewed' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'type'              => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'admin_email'       => new sfValidatorPass(array('required' => false)),
      'user_email'        => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_backend_viewed' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('site_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteEvent';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'type'              => 'Text',
      'description'       => 'Text',
      'admin_email'       => 'Text',
      'user_email'        => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'is_backend_viewed' => 'Boolean',
    );
  }
}
