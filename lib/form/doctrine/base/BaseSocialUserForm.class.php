<?php

/**
 * SocialUser form base class.
 * sfDoctrineFormGenerator 
 * @method SocialUser getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSocialUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                  => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'facebook_user_id'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'facebook_user_info'  => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'vkontakte_user_id'   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'vkontakte_user_info' => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'google_user_id'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'google_user_info'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'mailru_user_id'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'mailru_user_info'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'yandex_user_id'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'yandex_user_info'    => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'twitter_user_id'     => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'twitter_user_info'   => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      
        
        
       
            
            
              'email'               => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'facebook_user_id'    => new sfValidatorNumber(array('required' => false)),
                  
              'facebook_user_info'  => new sfValidatorString(array('required' => false)),
                  
              'vkontakte_user_id'   => new sfValidatorNumber(array('required' => false)),
                  
              'vkontakte_user_info' => new sfValidatorString(array('required' => false)),
                  
              'google_user_id'      => new sfValidatorNumber(array('required' => false)),
                  
              'google_user_info'    => new sfValidatorString(array('required' => false)),
                  
              'mailru_user_id'      => new sfValidatorNumber(array('required' => false)),
                  
              'mailru_user_info'    => new sfValidatorString(array('required' => false)),
                  
              'yandex_user_id'      => new sfValidatorNumber(array('required' => false)),
                  
              'yandex_user_info'    => new sfValidatorString(array('required' => false)),
                  
              'twitter_user_id'     => new sfValidatorNumber(array('required' => false)),
                  
              'twitter_user_info'   => new sfValidatorString(array('required' => false)),
                  
              'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
                  
              'email'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('social_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SocialUser';
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
