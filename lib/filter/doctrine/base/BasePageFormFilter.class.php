<?php

/**
 * Page filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'             => new sfWidgetFormFilterInput(),
      'is_module_page'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'module_name'         => new sfWidgetFormFilterInput(),
      'is_content_editable' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'special_mark'        => new sfWidgetFormFilterInput(),
      'is_redirect'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'redirect_route'      => new sfWidgetFormFilterInput(),
      'redirect_timeout'    => new sfWidgetFormFilterInput(),
      'layout'              => new sfWidgetFormFilterInput(),
      'slug'                => new sfWidgetFormFilterInput(),
      'meta_title'          => new sfWidgetFormFilterInput(),
      'meta_description'    => new sfWidgetFormFilterInput(),
      'meta_keywords'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'content'             => new sfValidatorPass(array('required' => false)),
      'is_module_page'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'module_name'         => new sfValidatorPass(array('required' => false)),
      'is_content_editable' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'special_mark'        => new sfValidatorPass(array('required' => false)),
      'is_redirect'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'redirect_route'      => new sfValidatorPass(array('required' => false)),
      'redirect_timeout'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'layout'              => new sfValidatorPass(array('required' => false)),
      'slug'                => new sfValidatorPass(array('required' => false)),
      'meta_title'          => new sfValidatorPass(array('required' => false)),
      'meta_description'    => new sfValidatorPass(array('required' => false)),
      'meta_keywords'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'name'                => 'Text',
      'content'             => 'Text',
      'is_module_page'      => 'Boolean',
      'module_name'         => 'Text',
      'is_content_editable' => 'Boolean',
      'special_mark'        => 'Text',
      'is_redirect'         => 'Boolean',
      'redirect_route'      => 'Text',
      'redirect_timeout'    => 'Number',
      'layout'              => 'Text',
      'slug'                => 'Text',
      'meta_title'          => 'Text',
      'meta_description'    => 'Text',
      'meta_keywords'       => 'Text',
    );
  }
}
