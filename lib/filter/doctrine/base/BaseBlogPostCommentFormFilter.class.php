<?php

/**
 * BlogPostComment filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBlogPostCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_post_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BlogPost'), 'add_empty' => true)),
      'username'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'      => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'blog_post_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('BlogPost'), 'column' => 'id')),
      'username'     => new sfValidatorPass(array('required' => false)),
      'comment'      => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('blog_post_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogPostComment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'blog_post_id' => 'ForeignKey',
      'username'     => 'Text',
      'comment'      => 'Text',
      'is_published' => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
