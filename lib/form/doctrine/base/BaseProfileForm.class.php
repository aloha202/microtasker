<?php

/**
 * Profile form base class.
 * sfDoctrineFormGenerator 
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                    => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'first_name'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'last_name'             => new sfWidgetFormInputText(),
      
        
        
       
            
            
                      'image' => $this->getObject()->getImage() ? new sfWidgetFormInputImageBuilder(array(
            'thumbs' => sfConfig::get('app_profile_thumbs'),
            'callback' => sfContext::getInstance()->getController()->genUrl(sfConfig::get('app_profile_callback') . '?model=Profile&id=' . $this->getObject()->getId()),
            'file_src' => $this->getObject()->getPhotoPath(),
            'template' => '<div rel="jcrop">%file%</div>'
        )) : new sfWidgetFormInputFile,        
      
        
        
       
            
            
              'dob'                   => new sfWidgetFormDate(),
      
        
        
       
            
            
              'email'                 => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'phone'                 => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'about'                 => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at'            => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'            => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'geo_lat'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_lng'               => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_country'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_city'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_address'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'geo_address_formatted' => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'first_name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'last_name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'image' => new sfValidatorFile(array(
         'path' => sfConfig::get('sf_web_dir') . '/uploads/profile',
         'required' => false,
         'mime_types' => 'web_images',
        )),
        'image_delete' => new sfValidatorPass,
                  
              'dob'                   => new sfValidatorDate(array('required' => false)),
                  
              'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'phone'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'about'                 => new sfValidatorString(array('required' => false)),
                  
              'created_at'            => new sfValidatorDateTime(),
                  
              'updated_at'            => new sfValidatorDateTime(),
                  
              'geo_lat'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_lng'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_country'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_city'              => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'geo_address'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'geo_address_formatted' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
          unset($this['geo_lat'], $this['geo_lng'], $this['geo_country'], $this['geo_city'], $this['geo_address'], $this['geo_address_formatted']);
        $this->widgetSchema['gmaps'] = new myWidgetFormGmaps(array(
        ));
        $this->validatorSchema['gmaps'] = new myValidatorGeo(array('required' => false));
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Profile';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                if(!empty($this->values['gmaps'])){
          $object->setGeoLat($this->values['gmaps']['lat']);
          $object->setGeoLng($this->values['gmaps']['lng']);      
          $object->setGeoCity($this->values['gmaps']['city']);            
          $object->setGeoCountry($this->values['gmaps']['country']);                  
          $object->setGeoAddress($this->values['gmaps']['address']);                        
          $object->setGeoAddressFormatted($this->values['gmaps']['address_formatted']);                        
        }        
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
          if($this->getObject()->hasGeo()){
          $this->setDefault('gmaps', array(
              'lat' => $this->getObject()->getGeoLat(), 
              'lng' => $this->getObject()->getGeoLng(),
              'city' => $this->getObject()->getGeoCity(),
              'country' => $this->getObject()->getGeoCountry(),              
              'address' => $this->getObject()->getGeoAddress(),                            
              'address_formatted' => $this->getObject()->getGeoAddressFormatted(),                                          
          ));
      }    
      }
  
}
