<?php

/**
 * BlogPost form base class.
 * sfDoctrineFormGenerator 
 * @method BlogPost getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseBlogPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'               => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'name'             => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'date'             => new sfWidgetFormDate(),
      
        
        
       
            
            
                      'image' => $this->getObject()->getImage() ? new sfWidgetFormInputImageBuilder(array(
            'thumbs' => sfConfig::get('app_blog_post_thumbs'),
            'callback' => sfContext::getInstance()->getController()->genUrl(sfConfig::get('app_blog_post_callback') . '?model=BlogPost&id=' . $this->getObject()->getId()),
            'file_src' => $this->getObject()->getPhotoPath(),
            'template' => '<div rel="jcrop">%file%</div>'
        )) : new sfWidgetFormInputFile,        
      
        
        
       
            
            
              'brief'            => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'extra'            => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'text'             => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'is_published'     => new sfWidgetFormInputCheckbox(),
      
        
        
       
            
            
              'created_at'       => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'updated_at'       => new sfWidgetFormDateTime(),
      
        
        
       
            
            
              'meta_title'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_description' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')),        
      
        
        
       
            
            
              'meta_keywords' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')), 
      
        
        
       
            
            
              'slug'             => new sfWidgetFormInputText(),
      
        
        
      'tags_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'BlogTag')),
    ));

    $this->setValidators(array(
            
              'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'name'             => new sfValidatorString(array('max_length' => 255)),
                  
              'date'             => new sfValidatorDate(),
                  
              'image' => new sfValidatorFile(array(
         'path' => sfConfig::get('sf_web_dir') . '/uploads/blog_post',
         'required' => false,
         'mime_types' => 'web_images',
        )),
        'image_delete' => new sfValidatorPass,
                  
              'brief'            => new sfValidatorString(array('required' => false)),
                  
              'extra'            => new sfValidatorString(array('required' => false)),
                  
              'text'             => new sfValidatorString(array('required' => false)),
                  
              'is_published'     => new sfValidatorBoolean(array('required' => false)),
                  
              'created_at'       => new sfValidatorDateTime(),
                  
              'updated_at'       => new sfValidatorDateTime(),
                  
              'meta_title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_keywords'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'tags_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'BlogTag', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BlogPost', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('blog_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
         unset($this['created_at'], $this['updated_at']);
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'BlogPost';
  }
    public function updateObject($values = null)
    {
        $object = parent::updateObject($values);
                return $object;
    }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();
        if (isset($this->widgetSchema['tags_list']))
    {
      $this->setDefault('tags_list', $this->object->Tags->getPrimaryKeys());
    }

  }
  
  public function saveTagsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tags_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tags->getPrimaryKeys();
    $values = $this->getValue('tags_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tags', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tags', array_values($link));
    }
  }

  
  
  
  protected function doSave($con = null)
  {
  
    $this->saveTagsList($con);
        parent::doSave($con);
    

  }


}
