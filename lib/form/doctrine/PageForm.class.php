<?php

/**
 * Page form.
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
      unset(
              $this['is_module_page'], 
              $this['module_name'], 
              $this['is_content_editable'], 
              $this['special_mark'],
              $this['redirect301_old_url']
              );
      
      if(!$this->isNew() && !$this->getObject()->getIsContentEditable()){
          unset($this['content']);
      }
      //sfContext::getInstance()->getUser()->setCulture('ru');
      //$this->embedLanguages();
  }
  
  public function updateObject($values = null) {
      $object = parent::updateObject($values);
      
      return $object;
  }
  
  public function doSave($conn = null)
  {
      parent::doSave($conn);
      

  }
}
