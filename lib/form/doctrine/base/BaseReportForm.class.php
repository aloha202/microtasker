<?php

/**
 * Report form base class.
 * sfDoctrineFormGenerator 
 * @method Report getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseReportForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'              => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      
        
        
       
            
            
              'microtask_count' => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'info'            => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'created_at'      => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'      => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
                  
              'microtask_count' => new sfValidatorInteger(array('required' => false)),
                  
              'info'            => new sfValidatorString(array('required' => false)),
                  
              'created_at'      => new sfValidatorDateTime(),
                  
              'updated_at'      => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'Report';
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
