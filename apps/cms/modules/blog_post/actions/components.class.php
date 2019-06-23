<?php

/**
 * blog_post actions.
 *
 * @package    cms
 * @subpackage blog_post
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoBlog_post/actions/components.class.php';

class blog_postComponents extends autoBlog_postComponents
{
    public function executeTags()
    {
        $this->tags = Q::c('BlogTag', 't')
                ->orderBy('t.name')
                ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
                ->execute()
                ;
    }
}