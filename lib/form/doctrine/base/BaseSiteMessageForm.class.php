<?php

/**
 * SiteMessage form base class.
 * sfDoctrineFormGenerator 
 * @method SiteMessage getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSiteMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'type'              => new sfWidgetFormChoice(array('choices' => array('contact' => 'contact', 'wishlist' => 'wishlist'))),
      
        
        
       
            
            
              'name'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'phone_number'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'email'             => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'company_name'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'message'           => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'        => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              
        'attach' => new sfWidgetFormInputFileEditable(array(
            'file_src' => '/uploads/' . sfInflector::underscore(get_class($this->getObject())) .  '/' . $this->getObject()->getAttach(),
            'template' => $this->getObject()->getAttach() ? "%input%<a href='%file%' class='download'>{$this->getObject()->getAttachName()}</a><br />%delete%%delete_label%" : "%input%"
        )),
      
        
        
       
            
            
              'attach_name'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'attach_mime'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_backend_viewed' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'type'              => new sfValidatorChoice(array('choices' => array(0 => 'contact', 1 => 'wishlist'), 'required' => false)),
                  
              'name'              => new sfValidatorString(array('max_length' => 255)),
                  
              'phone_number'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'email'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'company_name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'message'           => new sfValidatorString(array('required' => false)),
                  
              'created_at'        => new sfValidatorDateTime(),
                  
              'updated_at'        => new sfValidatorDateTime(),
                  
              
                   
        'attach' => new sfValidatorFile(array(
            'path' => sfConfig::get('sf_web_dir') . '/uploads/site_message/',
            'mime_types' => "*",
            'required' => false
        )),     
        'attach_delete' => new sfValidatorPass,
                  
              'attach_name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'attach_mime'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'is_backend_viewed' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('site_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           unset($this['attach_name'], $this['attach_mime']);
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SiteMessage';
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
  
  
  protected function doSave($con = null)
  {
  
        if (!empty($this->values['attach'])) {
        if ($this->values['attach'] instanceof sfValidatedFile) {
            $this->getObject()->setAttachName($this->values['attach']->getOriginalName());
            $this->getObject()->setAttachMime($this->values['attach']->getType());
        }
    }    
        parent::doSave($con);
    

  }


}
