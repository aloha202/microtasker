<?php

/**
 * MenuItem form base class.
 * sfDoctrineFormGenerator 
 * @method MenuItem getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseMenuItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'            => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'          => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'root_name'     => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'type'          => new sfWidgetFormChoice(array('choices' => array('empty' => 'empty', 'page' => 'page', 'module' => 'module', 'route' => 'route', 'external' => 'external'))),
      
        
        
       
            
            
              'page_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => true)),
      
        
        
       
            
            
              'cms_module_id' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'route'         => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'external'      => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'is_empty'      => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'is_auth'       => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'icon_class'    => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'root_id'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'lft'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'rgt'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'level'         => new sfWidgetFormInputText(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'          => new sfValidatorString(array('max_length' => 255)),
                  
              'root_name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'type'          => new sfValidatorChoice(array('choices' => array(0 => 'empty', 1 => 'page', 2 => 'module', 3 => 'route', 4 => 'external'), 'required' => false)),
                  
              'page_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'required' => false)),
                  
              'cms_module_id' => new sfValidatorInteger(array('required' => false)),
                  
              'route'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'external'      => new sfValidatorString(array('required' => false)),
                  
              'is_empty'      => new sfValidatorBoolean(array('required' => false)),
                  
              'is_auth'       => new sfValidatorBoolean(array('required' => false)),
                  
              'icon_class'    => new sfValidatorString(array('max_length' => 32, 'required' => false)),
                  
              'root_id'       => new sfValidatorInteger(array('required' => false)),
                  
              'lft'           => new sfValidatorInteger(array('required' => false)),
                  
              'rgt'           => new sfValidatorInteger(array('required' => false)),
                  
              'level'         => new sfValidatorInteger(array('required' => false)),
          ));

    $this->widgetSchema->setNameFormat('menu_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'MenuItem';
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
