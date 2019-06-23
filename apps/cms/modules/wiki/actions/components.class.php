<?php

/**
 * wiki actions.
 *
 * @package    cms
 * @subpackage wiki
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Alex.Radyuk $
 */
require_once sfConfig::get('sf_cache_dir') . '/' 
        . sfContext::getInstance()->getConfiguration()->getApplication() . '/'
        . sfConfig::get('sf_environment') . '/'
        . 'modules/autoWiki/actions/components.class.php';

class wikiComponents extends autoWikiComponents
{
    public function executeMenu()
    {
        $this->wikis = Q::c('Wiki', 'w')
                ->where('w.is_published = ?', true)
                ->orderBy('w.sort_order')
                ->execute()
                ;
    }
}