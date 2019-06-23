<?php

/**
 * MicrotaskPreset filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMicrotaskPresetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'down' => 'down', 'up' => 'up', 'blocker' => 'blocker'))),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description' => new sfValidatorPass(array('required' => false)),
      'type'        => new sfValidatorChoice(array('required' => false, 'choices' => array('down' => 'down', 'up' => 'up', 'blocker' => 'blocker'))),
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('microtask_preset_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'MicrotaskPreset';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'description' => 'Text',
      'type'        => 'Enum',
      'user_id'     => 'ForeignKey',
    );
  }
}
