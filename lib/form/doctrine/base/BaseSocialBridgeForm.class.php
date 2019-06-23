<?php

/**
 * SocialBridge form base class.
 * sfDoctrineFormGenerator 
 * @method SocialBridge getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSocialBridgeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'              => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'email'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'status'          => new sfWidgetFormChoice(array('choices' => array('new' => 'new', 'processing' => 'processing', 'closed' => 'closed'))),
      
        
        
       
            
            
              'token'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'network'         => new sfWidgetFormChoice(array('choices' => array('facebook' => 'facebook', 'vkontakte' => 'vkontakte', 'mailru' => 'mailru', 'google' => 'google', 'yandex' => 'yandex', 'twitter' => 'twitter'))),
      
        
        
       
            
            
              'network_user_id' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'created_at'      => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'      => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'email'           => new sfValidatorString(array('max_length' => 64)),
                  
              'status'          => new sfValidatorChoice(array('choices' => array(0 => 'new', 1 => 'processing', 2 => 'closed'), 'required' => false)),
                  
              'token'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'network'         => new sfValidatorChoice(array('choices' => array(0 => 'facebook', 1 => 'vkontakte', 2 => 'mailru', 3 => 'google', 4 => 'yandex', 5 => 'twitter'), 'required' => false)),
                  
              'network_user_id' => new sfValidatorInteger(array('required' => false)),
                  
              'created_at'      => new sfValidatorDateTime(),
                  
              'updated_at'      => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('social_bridge[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SocialBridge';
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
