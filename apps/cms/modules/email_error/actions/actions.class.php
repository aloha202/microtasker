<?php

require_once dirname(__FILE__).'/../lib/email_errorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/email_errorGeneratorHelper.class.php';

/**
 * email_error actions.
 *
 * @package    cms
 * @subpackage email_error
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class email_errorActions extends autoEmail_errorActions
{
    public function preExecute()
    {
        if(!$this->getContext()->isDeveloper()){
            return $this->redirect('@homepage');
        }
        parent::preExecute();
    }       
}
