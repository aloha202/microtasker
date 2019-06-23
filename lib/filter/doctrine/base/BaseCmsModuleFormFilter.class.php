<?php

/**
 * CmsModule filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCmsModuleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'model'                  => new sfWidgetFormFilterInput(),
      'model_sitemap_callback' => new sfWidgetFormFilterInput(),
      'show_route'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                   => new sfValidatorPass(array('required' => false)),
      'is_active'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'model'                  => new sfValidatorPass(array('required' => false)),
      'model_sitemap_callback' => new sfValidatorPass(array('required' => false)),
      'show_route'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cms_module_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'CmsModule';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'name'                   => 'Text',
      'is_active'              => 'Boolean',
      'model'                  => 'Text',
      'model_sitemap_callback' => 'Text',
      'show_route'             => 'Text',
    );
  }
}
