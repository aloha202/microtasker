<?php

/**
 * News filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNewsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brief'            => new sfWidgetFormFilterInput(),
      'content'          => new sfWidgetFormFilterInput(),
      'image'            => new sfWidgetFormFilterInput(),
      'slug'             => new sfWidgetFormFilterInput(),
      'meta_title'       => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'title'            => new sfValidatorPass(array('required' => false)),
      'brief'            => new sfValidatorPass(array('required' => false)),
      'content'          => new sfValidatorPass(array('required' => false)),
      'image'            => new sfValidatorPass(array('required' => false)),
      'slug'             => new sfValidatorPass(array('required' => false)),
      'meta_title'       => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'date'             => 'Date',
      'title'            => 'Text',
      'brief'            => 'Text',
      'content'          => 'Text',
      'image'            => 'Text',
      'slug'             => 'Text',
      'meta_title'       => 'Text',
      'meta_description' => 'Text',
      'meta_keywords'    => 'Text',
    );
  }
}
