<?php

/**
 * site_event actions.
 *
 * @package    cms
 * @subpackage site_event
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoSite_event/actions/components.class.php';

class site_eventComponents extends autoSite_eventComponents
{
}