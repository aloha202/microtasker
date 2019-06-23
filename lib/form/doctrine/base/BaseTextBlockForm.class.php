<?php

/**
 * TextBlock form base class.
 * sfDoctrineFormGenerator 
 * @method TextBlock getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseTextBlockForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'          => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'        => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'title'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'text'        => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'application' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'module'      => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'        => new sfValidatorString(array('max_length' => 255)),
                  
              'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'text'        => new sfValidatorString(array('required' => false)),
                  
              'application' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'module'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('text_block[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'TextBlock';
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
