<?php

/**
 * myDoctrineRecord form base class.
 * sfDoctrineFormGenerator 
 * @method myDoctrineRecord getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemyDoctrineRecordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
              'id' => new sfWidgetFormInputHidden(),
          ));

    $this->setValidators(array(
            
              'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('my_doctrine_record[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'myDoctrineRecord';
  }

}
