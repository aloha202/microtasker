<?php

/**
 * Wiki filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWikiFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'      => new sfWidgetFormFilterInput(),
      'sort_order'   => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'content'      => new sfValidatorPass(array('required' => false)),
      'sort_order'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_published' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('wiki_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Wiki';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'content'      => 'Text',
      'sort_order'   => 'Number',
      'is_published' => 'Boolean',
    );
  }
}
