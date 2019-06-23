<?php

/**
 * BlogTag form base class.
 * sfDoctrineFormGenerator 
 * @method BlogTag getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseBlogTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'              => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'            => new sfWidgetFormInputText(),
      
        
        
      'blog_posts_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BlogPost')),
    ));

    $this->setValidators(array(
            
              'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'            => new sfValidatorString(array('max_length' => 255)),
            'blog_posts_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BlogPost', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BlogTag', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('blog_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'BlogTag';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
        if (isset($this->widgetSchema['blog_posts_list']))
    {
      $this->setDefault('blog_posts_list', $this->object->BlogPosts->getPrimaryKeys());
    }

  }
  
  public function saveBlogPostsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['blog_posts_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->BlogPosts->getPrimaryKeys();
    $values = $this->getValue('blog_posts_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('BlogPosts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('BlogPosts', array_values($link));
    }
  }

  
  
  
  protected function doSave($con = null)
  {
  
    $this->saveBlogPostsList($con);
        parent::doSave($con);
    

  }


}
