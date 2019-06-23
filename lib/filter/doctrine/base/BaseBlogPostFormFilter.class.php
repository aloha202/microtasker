<?php

/**
 * BlogPost filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBlogPostFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'image'            => new sfWidgetFormFilterInput(),
      'brief'            => new sfWidgetFormFilterInput(),
      'extra'            => new sfWidgetFormFilterInput(),
      'text'             => new sfWidgetFormFilterInput(),
      'is_published'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'meta_title'       => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
      'slug'             => new sfWidgetFormFilterInput(),
      'tags_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BlogTag')),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'image'            => new sfValidatorPass(array('required' => false)),
      'brief'            => new sfValidatorPass(array('required' => false)),
      'extra'            => new sfValidatorPass(array('required' => false)),
      'text'             => new sfValidatorPass(array('required' => false)),
      'is_published'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'meta_title'       => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'slug'             => new sfValidatorPass(array('required' => false)),
      'tags_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BlogTag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function addTagsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.BlogPost2BlogTag BlogPost2BlogTag')
      ->andWhereIn('BlogPost2BlogTag.blog_tag_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'BlogPost';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'date'             => 'Date',
      'image'            => 'Text',
      'brief'            => 'Text',
      'extra'            => 'Text',
      'text'             => 'Text',
      'is_published'     => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'meta_title'       => 'Text',
      'meta_description' => 'Text',
      'meta_keywords'    => 'Text',
      'slug'             => 'Text',
      'tags_list'        => 'ManyKey',
    );
  }
}
