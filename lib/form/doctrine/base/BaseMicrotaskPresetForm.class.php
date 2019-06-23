<?php

/**
 * MicrotaskPreset form base class.
 * sfDoctrineFormGenerator 
 * @method MicrotaskPreset getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseMicrotaskPresetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'          => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'description' => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'type'        => new sfWidgetFormChoice(array('choices' => array('down' => 'down', 'up' => 'up', 'blocker' => 'blocker'))),
      
        
        
       
            
            
              'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'description' => new sfValidatorString(),
                  
              'type'        => new sfValidatorChoice(array('choices' => array(0 => 'down', 1 => 'up', 2 => 'blocker'), 'required' => false)),
                  
              'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('microtask_preset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'MicrotaskPreset';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
      }
  
}
