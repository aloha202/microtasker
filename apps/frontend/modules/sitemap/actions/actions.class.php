<?php

/**
 * sitemap actions.
 *
 * @package    cms
 * @subpackage sitemap
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sitemapActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $sitemap = array();
      $tree = Doctrine::getTable('MenuItem')->getTree();
      $roots = $tree->fetchRoots();
      foreach($roots as $root){
          $menu = $tree->fetchTree(array('root_id' => $root->getId()));
          foreach($menu as $item){
              if($item->getLevel()){
                $sitemap[] = $item;
                if($item->getType() == 'module'){
                    $module = $item->getCmsModule();
                    foreach($module->getSitemapObjects() as $object){
                        $sitemap[] = $object;
                    }
                }
              }
          }
      }
      $this->map = $sitemap;
  }
  
  public function executeXml(sfWebRequest $request)
  {
      
  }
}
