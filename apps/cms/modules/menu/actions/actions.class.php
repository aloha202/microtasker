<?php

require_once dirname(__FILE__) . '/../lib/menuGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/menuGeneratorHelper.class.php';

/**
 * menu actions.
 *
 * @package    cms
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends autoMenuActions {

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->getNode()->delete()) {
            $this->getUser()->setFlash('notice', 'Item deleted');
        }

        $this->redirect('menu/index');
    }

    public function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $records = Doctrine_Query::create()
                ->from('MenuItem')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($records as $record) {
            $record->getNode()->delete();
        }

        $this->getUser()->setFlash('notice', 'Items deleted');

        $this->redirect('menu/index');
    }
    
    public function executeListUp(sfWebRequest $request)
    {
        $menu_item = $this->getRoute()->getObject();
        
        if($menu_item->getNode()->hasPrevSibling()){
            $menu_item->getNode()->moveAsPrevSiblingOf($menu_item->getNode()->getPrevSibling());
            $this->getUser()->setFlash('notice', 'Item moved successfully');
        }
        
        return $this->redirect($request->getReferer());
    }
    
    public function executeListDown(sfWebRequest $request)
    {
        $menu_item = $this->getRoute()->getObject();
        if($menu_item->getNode()->hasNextSibling()){
            $menu_item->getNode()->moveAsNextSiblingOf($menu_item->getNode()->getNextSibling());
            $this->getUser()->setFlash('notice', 'Item moved successfully');            
        }
        
        return $this->redirect($request->getReferer());
    }
    
    public function executeTree(sfWebRequest $request)
    {
        if(!$request->getParameter('root')){
            return $this->redirect('menu_root/index');
        }
    }

    protected function addSortQuery($query) {
        $query->addOrderBy('root_id asc');
        $query->addOrderBy('lft asc');
    }

}
