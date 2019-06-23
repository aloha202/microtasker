<?php

/**
 * Localization filter form.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LocalizationFormFilter extends BaseLocalizationFormFilter {

    public function configure() {

      //  $this->useFields(array('ru'));        
      //  $this->widgetSchema['ru'] = new sfWidgetFormTextarea;
      //  $this->noEditor('ru');        
     //   if(MyConfig::get('project_lang') != 'ru'){
        $this->useFields(array());
            $this->widgetSchema['text'] = new sfWidgetFormTextarea;
            $this->noEditor('text');

            $this->validatorSchema['text'] = new sfValidatorString(array('required' => false));
       // }
        
    }
    
    public function buildQuery(array $values)
    {
        $q = parent::buildQuery($values);
        $a = $q->getRootAlias();
        $lang = MyConfig::get('project_lang');
        if(!empty($values['text'])){
            $q->addWhere("$a.$lang LIKE ?", "%{$values['text']}%");
        }
        return $q;
    }

}
