<?php

/**
 * EmailTemplate form base class.
 * sfDoctrineFormGenerator 
 * @method EmailTemplate getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseEmailTemplateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'      => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'subject' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'message' => new sfWidgetFormTextarea(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'    => new sfValidatorString(array('max_length' => 255)),
                  
              'subject' => new sfValidatorString(array('max_length' => 255)),
                  
              'message' => new sfValidatorString(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('email_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'EmailTemplate';
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
