<?php

/**
 * email_error actions.
 *
 * @package    cms
 * @subpackage email_error
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoEmail_error/actions/components.class.php';

class email_errorComponents extends autoEmail_errorComponents
{
}