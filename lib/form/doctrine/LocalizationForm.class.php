<?php

/**
 * Localization form.
  sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LocalizationForm extends BaseLocalizationForm {

    public function configure() {

        $langs = sfConfig::get('app_langs_all');
        $langs = array_keys($langs);
        $this->useFields($langs);
        foreach ($langs as $key) {
            $this->noEditor($key);
        }
    }
    
    
    public function doSave($con = null)
    {
        parent::doSave($con);
        
        $this->getObject()->loadValue(MyConfig::get('project_lang'));
    }

}
