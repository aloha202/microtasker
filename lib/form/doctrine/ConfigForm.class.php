<?php

/**
 * Config form.
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConfigForm extends BaseConfigForm
{
  public function configure()
  {
      $this->useFields(array('value'));
      if(!$this->getObject()->getUseWysiwyg()){
        $this->widgetSchema['value']->setAttribute('class', 'mceNoEditor');
      }
      
      if($this->getObject()->getHelp()){
          $this->widgetSchema->setHelp('value', $this->getObject()->getHelp());
      }
      
  }
}
