<?php

/**
 * Redirect301 form base class.
 * sfDoctrineFormGenerator 
 * @method Redirect301 getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseRedirect301Form extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'         => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'url_from'   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'url_to'     => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_active'  => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'comment'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'use_count'  => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'created_at' => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at' => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'url_from'   => new sfValidatorString(array('max_length' => 255)),
                  
              'url_to'     => new sfValidatorString(array('max_length' => 255)),
                  
              'is_active'  => new sfValidatorBoolean(array('required' => false)),
                  
              'comment'    => new sfValidatorString(array('required' => false)),
                  
              'use_count'  => new sfValidatorInteger(array('required' => false)),
                  
              'created_at' => new sfValidatorDateTime(),
                  
              'updated_at' => new sfValidatorDateTime(),
          ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Redirect301', 'column' => array('url_from')))
    );

    $this->widgetSchema->setNameFormat('redirect301[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Redirect301';
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
