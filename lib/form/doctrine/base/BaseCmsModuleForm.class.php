<?php

/**
 * CmsModule form base class.
 * sfDoctrineFormGenerator 
 * @method CmsModule getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseCmsModuleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'                     => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'                   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_active'              => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'model'                  => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'model_sitemap_callback' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'show_route'             => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'                   => new sfValidatorString(array('max_length' => 255)),
                  
              'is_active'              => new sfValidatorBoolean(array('required' => false)),
                  
              'model'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'model_sitemap_callback' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'show_route'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CmsModule', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('cms_module[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'CmsModule';
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
