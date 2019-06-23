<?php

/**
 * EmailError filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailErrorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_from' => new sfWidgetFormFilterInput(),
      'email_to'   => new sfWidgetFormFilterInput(),
      'subject'    => new sfWidgetFormFilterInput(),
      'body'       => new sfWidgetFormFilterInput(),
      'cc'         => new sfWidgetFormFilterInput(),
      'file'       => new sfWidgetFormFilterInput(),
      'errmes'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'email_from' => new sfValidatorPass(array('required' => false)),
      'email_to'   => new sfValidatorPass(array('required' => false)),
      'subject'    => new sfValidatorPass(array('required' => false)),
      'body'       => new sfValidatorPass(array('required' => false)),
      'cc'         => new sfValidatorPass(array('required' => false)),
      'file'       => new sfValidatorPass(array('required' => false)),
      'errmes'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('email_error_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailError';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'email_from' => 'Text',
      'email_to'   => 'Text',
      'subject'    => 'Text',
      'body'       => 'Text',
      'cc'         => 'Text',
      'file'       => 'Text',
      'errmes'     => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
