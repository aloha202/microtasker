<?php

/**
 * SiteVisitPage filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSiteVisitPageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'site_visit_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteVisit'), 'add_empty' => true)),
      'url'           => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'site_visit_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteVisit'), 'column' => 'id')),
      'url'           => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('site_visit_page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteVisitPage';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'site_visit_id' => 'ForeignKey',
      'url'           => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
