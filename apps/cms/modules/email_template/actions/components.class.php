<?php

/**
 * email_template actions.
 *
 * @package    cms
 * @subpackage email_template
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoEmail_template/actions/components.class.php';

class email_templateComponents extends autoEmail_templateComponents
{
}