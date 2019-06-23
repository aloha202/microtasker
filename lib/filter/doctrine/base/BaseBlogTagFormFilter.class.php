<?php

/**
 * BlogTag filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBlogTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'blog_posts_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BlogPost')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'blog_posts_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BlogPost', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function addBlogPostsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('BlogPost2BlogTag.blog_post_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'BlogTag';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'blog_posts_list' => 'ManyKey',
    );
  }
}
