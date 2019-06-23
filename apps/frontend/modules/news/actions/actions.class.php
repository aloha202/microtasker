<?php

/**
 * news actions.
 *
 * @package    enerpower
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        //$this->setLayout('layout_news');
        Breadcrumbs::add(array('News', 'news/index'));
        $this->getContext()->set('global_header', 'News');
    }

    public function executeIndex(sfWebRequest $request) {
        $q = Doctrine::getTable('News')
                ->createQuery('n')
                ->orderBy('n.date DESC')
        ;
        $this->pager = new sfDoctrinePager('News', 10);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

      $this->getResponse()->setTitle(MyConfig::get('news_title'));
      $this->getResponse()->addMeta('keywords', MyConfig::get('news_keywords'));      
      $this->getResponse()->addMeta('description', MyConfig::get('news_description'));           
    }

    public function executeShow() {
        $this->news = $this->getRoute()->getObject();
        //$this->getResponse()->addTitle($this->news->getMetaTitle());
        Breadcrumbs::add(array($this->news));

        $this->getResponse()->setTitle($this->news->getMetaTitle());
        $this->getResponse()->addMeta('keywords', $this->news->getMetaKeywords());
        $this->getResponse()->addMeta('description', $this->news->getMetaDescription());
    }

}
