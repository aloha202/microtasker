<?php

/**
 * UserSettings form base class.
 * sfDoctrineFormGenerator 
 * @method UserSettings getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseUserSettingsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                           => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'is_fillet_locked'             => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'is_fillet_lock_message_shown' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'is_fillet_locked'             => new sfValidatorBoolean(array('required' => false)),
                  
              'is_fillet_lock_message_shown' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('user_settings[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'UserSettings';
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
