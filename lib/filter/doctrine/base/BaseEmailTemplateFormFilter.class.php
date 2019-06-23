<?php

/**
 * EmailTemplate filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmailTemplateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'subject' => new sfValidatorPass(array('required' => false)),
      'message' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailTemplate';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'subject' => 'Text',
      'message' => 'Text',
    );
  }
}
