<?php

/**
 * Wiki form base class.
 * sfDoctrineFormGenerator 
 * @method Wiki getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseWikiForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'           => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'content'      => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'sort_order'   => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'is_published' => new sfWidgetFormInputCheckbox(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'         => new sfValidatorString(array('max_length' => 255)),
                  
              'content'      => new sfValidatorString(array('required' => false)),
                  
              'sort_order'   => new sfValidatorInteger(array('required' => false)),
                  
              'is_published' => new sfValidatorBoolean(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('wiki[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Wiki';
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
