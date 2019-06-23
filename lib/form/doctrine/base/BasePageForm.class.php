<?php

/**
 * Page form base class.
 * sfDoctrineFormGenerator 
 * @method Page getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                  => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'                => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'content'             => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'is_module_page'      => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'module_name'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_content_editable' => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'special_mark'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_redirect'         => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'redirect_route'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'redirect_timeout'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'layout'              => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'slug'                => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_title'          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_description' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')),        
      
        
        
       
            
            
              'meta_keywords' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')), 
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'                => new sfValidatorString(array('max_length' => 255)),
                  
              'content'             => new sfValidatorString(array('required' => false)),
                  
              'is_module_page'      => new sfValidatorBoolean(array('required' => false)),
                  
              'module_name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'is_content_editable' => new sfValidatorBoolean(array('required' => false)),
                  
              'special_mark'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'is_redirect'         => new sfValidatorBoolean(array('required' => false)),
                  
              'redirect_route'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'redirect_timeout'    => new sfValidatorInteger(array('required' => false)),
                  
              'layout'              => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'slug'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_title'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_description'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_keywords'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Page', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Page';
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
