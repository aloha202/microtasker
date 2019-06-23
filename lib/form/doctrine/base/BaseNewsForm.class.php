<?php

/**
 * News form base class.
 * sfDoctrineFormGenerator 
 * @method News getObject() Returns the current form's model object
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
   
   
   
 
abstract class BaseNewsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
       
            
            
              'id'               => new sfWidgetFormInputHidden(),
      
        
        
       
            
            
              'date'             => new sfWidgetFormDate(),
      
        
        
       
            
            
              'title'            => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'brief'            => new sfWidgetFormTextarea(),
      
        
        
       
            
            
              'content'          => new sfWidgetFormTextarea(),
      
        
        
       
            
            
                      'image' => $this->getObject()->getImage() ? new sfWidgetFormInputImageBuilder(array(
            'thumbs' => sfConfig::get('app_news_thumbs'),
            'callback' => sfContext::getInstance()->getController()->genUrl(sfConfig::get('app_news_callback') . '?model=News&id=' . $this->getObject()->getId()),
            'file_src' => $this->getObject()->getPhotoPath(),
            'template' => '<div rel="jcrop">%file%</div>'
        )) : new sfWidgetFormInputFile,        
      
        
        
       
            
            
              'slug'             => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_title'       => new sfWidgetFormInputText(),
      
        
        
       
            
            
              'meta_description' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')),        
      
        
        
       
            
            
              'meta_keywords' => new sfWidgetFormTextarea(array(), array('class' => 'mceNoEditor')), 
      
        
        
    ));

    $this->setValidators(array(
            
              'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
                  
              'date'             => new sfValidatorDate(),
                  
              'title'            => new sfValidatorString(array('max_length' => 255)),
                  
              'brief'            => new sfValidatorString(array('required' => false)),
                  
              'content'          => new sfValidatorString(array('required' => false)),
                  
              'image' => new sfValidatorFile(array(
         'path' => sfConfig::get('sf_web_dir') . '/uploads/news',
         'required' => false,
         'mime_types' => 'web_images',
        )),
        'image_delete' => new sfValidatorPass,
                  
              'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
                  
              'meta_keywords'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
          ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'News', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
           
           
     
         
    $this->widgetSchema->setFormFormatterName('_Base');
  }

  public function getModelName()
  {
    return 'News';
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
