<?php

/**
 * CmsLanguage form base class.
 * sfDoctrineFormGenerator 
 * @method CmsLanguage getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseCmsLanguageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'        => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'      => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_active' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'      => new sfValidatorString(array('max_length' => 5)),
                  
              'is_active' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CmsLanguage', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('cms_language[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'CmsLanguage';
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
