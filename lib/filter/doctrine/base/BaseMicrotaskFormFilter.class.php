<?php

/**
 * Microtask filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMicrotaskFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'thread_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Thread'), 'add_empty' => true)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'new' => 'new', 'success' => 'success', 'fail' => 'fail'))),
      'priority'    => new sfWidgetFormFilterInput(),
      'is_blocker'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_reported' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'thread_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Thread'), 'column' => 'id')),
      'description' => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorChoice(array('required' => false, 'choices' => array('new' => 'new', 'success' => 'success', 'fail' => 'fail'))),
      'priority'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_blocker'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_reported' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('microtask_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Microtask';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'thread_id'   => 'ForeignKey',
      'description' => 'Text',
      'status'      => 'Enum',
      'priority'    => 'Number',
      'is_blocker'  => 'Boolean',
      'is_reported' => 'Boolean',
      'user_id'     => 'ForeignKey',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
