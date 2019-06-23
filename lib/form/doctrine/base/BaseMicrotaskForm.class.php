<?php

/**
 * Microtask form base class.
 * sfDoctrineFormGenerator 
 * @method Microtask getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseMicrotaskForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'          => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'thread_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Thread'), 'add_empty' => true)),
      
        
        
       
            
            
              'description' => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'status'      => new sfWidgetFormChoice(array('choices' => array('new' => 'new', 'success' => 'success', 'fail' => 'fail'))),
      
        
        
       
            
            
              'priority'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_blocker'  => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'is_reported' => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'created_at'  => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'  => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'thread_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Thread'), 'required' => false)),
                  
              'description' => new sfValidatorString(),
                  
              'status'      => new sfValidatorChoice(array('choices' => array(0 => 'new', 1 => 'success', 2 => 'fail'), 'required' => false)),
                  
              'priority'    => new sfValidatorInteger(array('required' => false)),
                  
              'is_blocker'  => new sfValidatorBoolean(array('required' => false)),
                  
              'is_reported' => new sfValidatorBoolean(array('required' => false)),
                  
              'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'created_at'  => new sfValidatorDateTime(),
                  
              'updated_at'  => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('microtask[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Microtask';
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
