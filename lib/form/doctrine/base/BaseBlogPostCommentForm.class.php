<?php

/**
 * BlogPostComment form base class.
 * sfDoctrineFormGenerator 
 * @method BlogPostComment getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseBlogPostCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'           => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'blog_post_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BlogPost'), 'add_empty' => false)),
      
        
        
       
            
            
              'username'     => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'comment'      => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'is_published' => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'created_at'   => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'   => new sfWidgetFormDateTime(),
      
        
        
    ));

    $this->setValidators(array(
            
              'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'blog_post_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BlogPost'))),
                  
              'username'     => new sfValidatorString(array('max_length' => 255)),
                  
              'comment'      => new sfValidatorString(array('required' => false)),
                  
              'is_published' => new sfValidatorBoolean(array('required' => false)),
                  
              'created_at'   => new sfValidatorDateTime(),
                  
              'updated_at'   => new sfValidatorDateTime(),
          ));

    $this->widgetSchema->setNameFormat('blog_post_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'BlogPostComment';
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
