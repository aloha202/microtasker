<?php

require_once dirname(__FILE__).'/../lib/wikiGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/wikiGeneratorHelper.class.php';

/**
 * wiki actions.
 *
 * @package    cms
 * @subpackage wiki
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wikiActions extends autoWikiActions
{
    public function preExecute()
    {
        if(!$this->getContext()->isDeveloper()){
            return $this->redirect('@homepage');
        }
        parent::preExecute();
    }
    public function executeShow(sfWebRequest $request)
    {
        parent::executeShow($request);
        $this->setLayout('layout_2');
    }
}
