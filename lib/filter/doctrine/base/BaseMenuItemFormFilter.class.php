<?php

/**
 * MenuItem filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenuItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'root_name'     => new sfWidgetFormFilterInput(),
      'type'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'empty' => 'empty', 'page' => 'page', 'module' => 'module', 'route' => 'route', 'external' => 'external'))),
      'page_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => true)),
      'cms_module_id' => new sfWidgetFormFilterInput(),
      'route'         => new sfWidgetFormFilterInput(),
      'external'      => new sfWidgetFormFilterInput(),
      'is_empty'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_auth'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'icon_class'    => new sfWidgetFormFilterInput(),
      'root_id'       => new sfWidgetFormFilterInput(),
      'lft'           => new sfWidgetFormFilterInput(),
      'rgt'           => new sfWidgetFormFilterInput(),
      'level'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'root_name'     => new sfValidatorPass(array('required' => false)),
      'type'          => new sfValidatorChoice(array('required' => false, 'choices' => array('empty' => 'empty', 'page' => 'page', 'module' => 'module', 'route' => 'route', 'external' => 'external'))),
      'page_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Page'), 'column' => 'id')),
      'cms_module_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'route'         => new sfValidatorPass(array('required' => false)),
      'external'      => new sfValidatorPass(array('required' => false)),
      'is_empty'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_auth'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'icon_class'    => new sfValidatorPass(array('required' => false)),
      'root_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lft'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('menu_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'root_name'     => 'Text',
      'type'          => 'Enum',
      'page_id'       => 'ForeignKey',
      'cms_module_id' => 'Number',
      'route'         => 'Text',
      'external'      => 'Text',
      'is_empty'      => 'Boolean',
      'is_auth'       => 'Boolean',
      'icon_class'    => 'Text',
      'root_id'       => 'Number',
      'lft'           => 'Number',
      'rgt'           => 'Number',
      'level'         => 'Number',
    );
  }
}
