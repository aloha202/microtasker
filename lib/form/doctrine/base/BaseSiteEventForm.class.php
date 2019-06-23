<?php

/**
 * SiteEvent form base class.
 * sfDoctrineFormGenerator 
 * @method SiteEvent getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSiteEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'type'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'description'       => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'admin_email'       => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'user_email'        => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'is_backend_viewed' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'type'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'description'       => new sfValidatorString(array('required' => false)),
                  
              'admin_email'       => new sfValidatorString(array('required' => false)),
                  
              'user_email'        => new sfValidatorString(array('required' => false)),
                  
              'created_at'        => new sfValidatorDateTime(),
                  
              'updated_at'        => new sfValidatorDateTime(),
                  
              'is_backend_viewed' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('site_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SiteEvent';
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
