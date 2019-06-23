<?php

/**
 * EmailError form base class.
 * sfDoctrineFormGenerator 
 * @method EmailError getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseEmailErrorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'         => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'email_from' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'email_to'   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'subject'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'body'       => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'cc'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'file'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'errmes'     => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at' => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at' => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'email_from' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'email_to'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'subject'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'body'       => new sfValidatorString(array('required' => false)),
                  
              'cc'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'file'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'errmes'     => new sfValidatorString(array('required' => false)),
                  
              'created_at' => new sfValidatorDateTime(),
                  
              'updated_at' => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('email_error[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'EmailError';
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
