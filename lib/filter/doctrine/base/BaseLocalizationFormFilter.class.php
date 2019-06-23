<?php

/**
 * Localization filter form base class.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLocalizationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'model' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pk'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'field' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ru'    => new sfWidgetFormFilterInput(),
      'en'    => new sfWidgetFormFilterInput(),
      'de'    => new sfWidgetFormFilterInput(),
      'es'    => new sfWidgetFormFilterInput(),
      'it'    => new sfWidgetFormFilterInput(),
      'fr'    => new sfWidgetFormFilterInput(),
      'pt'    => new sfWidgetFormFilterInput(),
      'sv'    => new sfWidgetFormFilterInput(),
      'fi'    => new sfWidgetFormFilterInput(),
      'no'    => new sfWidgetFormFilterInput(),
      'nl'    => new sfWidgetFormFilterInput(),
      'pl'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'model' => new sfValidatorPass(array('required' => false)),
      'pk'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'field' => new sfValidatorPass(array('required' => false)),
      'ru'    => new sfValidatorPass(array('required' => false)),
      'en'    => new sfValidatorPass(array('required' => false)),
      'de'    => new sfValidatorPass(array('required' => false)),
      'es'    => new sfValidatorPass(array('required' => false)),
      'it'    => new sfValidatorPass(array('required' => false)),
      'fr'    => new sfValidatorPass(array('required' => false)),
      'pt'    => new sfValidatorPass(array('required' => false)),
      'sv'    => new sfValidatorPass(array('required' => false)),
      'fi'    => new sfValidatorPass(array('required' => false)),
      'no'    => new sfValidatorPass(array('required' => false)),
      'nl'    => new sfValidatorPass(array('required' => false)),
      'pl'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('localization_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    $this->widgetSchema->setFormFormatterName('_Base');    

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localization';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'model' => 'Text',
      'pk'    => 'Number',
      'field' => 'Text',
      'ru'    => 'Text',
      'en'    => 'Text',
      'de'    => 'Text',
      'es'    => 'Text',
      'it'    => 'Text',
      'fr'    => 'Text',
      'pt'    => 'Text',
      'sv'    => 'Text',
      'fi'    => 'Text',
      'no'    => 'Text',
      'nl'    => 'Text',
      'pl'    => 'Text',
    );
  }
}
