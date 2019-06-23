<?php

/**
 * BlogPost2BlogTag form base class.
 * sfDoctrineFormGenerator 
 * @method BlogPost2BlogTag getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseBlogPost2BlogTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'blog_post_id' => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'blog_tag_id'  => new sfWidgetFormInputHidden(),
      
        
        
    ));

    $this->setValidators(array(
            
              'blog_post_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('blog_post_id')), 'empty_value' => $this->getObject()->get('blog_post_id'), 'required' => false)),
                  
              'blog_tag_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('blog_tag_id')), 'empty_value' => $this->getObject()->get('blog_tag_id'), 'required' => false)),
          ));

    $this->widgetSchema->setNameFormat('blog_post2_blog_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'BlogPost2BlogTag';
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
