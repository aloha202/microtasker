<?php

require_once dirname(__FILE__).'/../lib/localizationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/localizationGeneratorHelper.class.php';

/**
 * localization actions.
 *
 * @package    cms
 * @subpackage localization
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class localizationActions extends autoLocalizationActions
{
    public function preExecute()
    {
        parent::preExecute();
        $langs = array('ru', 'en');
        $project_lang = MyConfig::get('project_lang');
        if(!in_array($project_lang, $langs)){
            $langs[] = $project_lang;
        }
        $this->getContext()->set('langs', $langs);
        $this->getContext()->set('project_lang', $project_lang);
    }
}
