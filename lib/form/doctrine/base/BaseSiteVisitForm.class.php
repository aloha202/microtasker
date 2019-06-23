<?php

/**
 * SiteVisit form base class.
 * sfDoctrineFormGenerator 
 * @method SiteVisit getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSiteVisitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'         => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'ip_address' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'country'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'user_agent' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'created_at' => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at' => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'ip_address' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'country'    => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'user_agent' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'created_at' => new sfValidatorDateTime(),
                  
              'updated_at' => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('site_visit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SiteVisit';
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
