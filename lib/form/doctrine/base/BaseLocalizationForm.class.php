<?php

/**
 * Localization form base class.
 * sfDoctrineFormGenerator 
 * @method Localization getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseLocalizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'    => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'model' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'pk'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'field' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'ru'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'en'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'de'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'es'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'it'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'fr'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'pt'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'sv'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'fi'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'no'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'nl'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'pl'    => new sfWidgetFormTextarea(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'model' => new sfValidatorString(array('max_length' => 64)),
                  
              'pk'    => new sfValidatorInteger(),
                  
              'field' => new sfValidatorString(array('max_length' => 64)),
                  
              'ru'    => new sfValidatorString(array('required' => false)),
                  
              'en'    => new sfValidatorString(array('required' => false)),
                  
              'de'    => new sfValidatorString(array('required' => false)),
                  
              'es'    => new sfValidatorString(array('required' => false)),
                  
              'it'    => new sfValidatorString(array('required' => false)),
                  
              'fr'    => new sfValidatorString(array('required' => false)),
                  
              'pt'    => new sfValidatorString(array('required' => false)),
                  
              'sv'    => new sfValidatorString(array('required' => false)),
                  
              'fi'    => new sfValidatorString(array('required' => false)),
                  
              'no'    => new sfValidatorString(array('required' => false)),
                  
              'nl'    => new sfValidatorString(array('required' => false)),
                  
              'pl'    => new sfValidatorString(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('localization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Localization';
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
