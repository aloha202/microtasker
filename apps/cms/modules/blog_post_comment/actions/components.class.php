<?php

/**
 * blog_post_comment actions.
 *
 * @package    cms
 * @subpackage blog_post_comment
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoBlog_post_comment/actions/components.class.php';

class blog_post_commentComponents extends autoBlog_post_commentComponents
{
}