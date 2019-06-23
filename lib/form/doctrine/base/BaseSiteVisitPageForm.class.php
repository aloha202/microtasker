<?php

/**
 * SiteVisitPage form base class.
 * sfDoctrineFormGenerator 
 * @method SiteVisitPage getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseSiteVisitPageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'            => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'site_visit_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteVisit'), 'add_empty' => false)),
      
        
        
       
            
            
              'url'           => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'created_at'    => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'    => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'site_visit_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteVisit'))),
                  
              'url'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'created_at'    => new sfValidatorDateTime(),
                  
              'updated_at'    => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('site_visit_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'SiteVisitPage';
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
