<?php

/**
 * Todo form base class.
 * sfDoctrineFormGenerator 
 * @method Todo getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseTodoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'         => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'       => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'status'     => new sfWidgetFormChoice(array('choices' => array('open' => 'open', 'closed' => 'closed'))),
      
        
        
       
            
            
              'created_at' => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at' => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'       => new sfValidatorString(),
                  
              'status'     => new sfValidatorChoice(array('choices' => array(0 => 'open', 1 => 'closed'), 'required' => false)),
                  
              'created_at' => new sfValidatorDateTime(),
                  
              'updated_at' => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('todo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Todo';
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
