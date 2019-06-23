<?php

require_once dirname(__FILE__).'/../lib/settings_sysGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/settings_sysGeneratorHelper.class.php';

/**
 * settings_sys actions.
 *
 * @package    cms
 * @subpackage settings_sys
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settings_sysActions extends autoSettings_sysActions
{
    public function preExecute()
    {
        if(!$this->getContext()->isDeveloper()){
            return $this->redirect('@homepage');
        }
        parent::preExecute();
    }      
}