<?php

/**
 * SiteMessage filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSiteMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'contact' => 'contact', 'wishlist' => 'wishlist'))),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_number'      => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'company_name'      => new sfWidgetFormFilterInput(),
      'message'           => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'attach'            => new sfWidgetFormFilterInput(),
      'attach_name'       => new sfWidgetFormFilterInput(),
      'attach_mime'       => new sfWidgetFormFilterInput(),
      'is_backend_viewed' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'type'              => new sfValidatorChoice(array('required' => false, 'choices' => array('contact' => 'contact', 'wishlist' => 'wishlist'))),
      'name'              => new sfValidatorPass(array('required' => false)),
      'phone_number'      => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'company_name'      => new sfValidatorPass(array('required' => false)),
      'message'           => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'attach'            => new sfValidatorPass(array('required' => false)),
      'attach_name'       => new sfValidatorPass(array('required' => false)),
      'attach_mime'       => new sfValidatorPass(array('required' => false)),
      'is_backend_viewed' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('site_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteMessage';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'type'              => 'Enum',
      'name'              => 'Text',
      'phone_number'      => 'Text',
      'email'             => 'Text',
      'company_name'      => 'Text',
      'message'           => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'attach'            => 'Text',
      'attach_name'       => 'Text',
      'attach_mime'       => 'Text',
      'is_backend_viewed' => 'Boolean',
    );
  }
}
