<?php

/**
 * MenuItem form.
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuItemForm extends BaseMenuItemForm {

    public function configure() {
        /*
        $this->setWidget('parent', new sfWidgetFormDoctrineChoiceNestedSet(array(
                    'model' => 'MenuItem',
                    'add_empty' => true
                )));

        // Если текущая категория имеет родителя, выбрать его по умолчанию
        if ($this->getObject()->getNode()->hasParent()) {
            $this->setDefault('parent', $this->getObject()->getNode()->getParent()->getId());
        }
         * 
         */
        $this->useFields(array(
            'name',
            'type',
            'page_id',
            'cms_module_id',
            'route',
            'external',
            'is_auth',
            'icon_class'
        ));
   //     $this->embedLanguages();
        
        
        $q = Doctrine::getTable('CmsModule')->createQuery('m')
                ->where('m.is_active = ?', true)
                ;
        $this->widgetSchema['cms_module_id'] = new sfWidgetFormDoctrineChoice(array(
           'model' => 'CmsModule',
            'query' => $q
        ));
        
        
        $q = Doctrine::getTable('Page')->createQuery('p')
                //->where('p.is_module_page = ?', false)
                ;
        $this->widgetSchema['page_id']->setOption('query', $q);
         

        $this->widgetSchema['external'] = new sfWidgetFormInputText();
    }
    
  public function updateDefaultsFromObject()
  {
      parent::updateDefaultsFromObject();
  }

  public function doSave($con = null)
  {
 
    parent::doSave($con);
 
    // Если родитель был указан, добавить/переместить этот узел как потомок родительского узла
    /*
    if ($this->getValue('parent'))
    {
      $parent = Doctrine::getTable('MenuItem')->findOneById($this->getValue('parent'));
      if ($this->isNew())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        $this->getObject()->getNode()->moveAsLastChildOf($parent);
      }
    }
    // Если родители не были выбраны, добавить/переместить этот узел как новый корневой элемент в дереве
    else
    {
      $categoryTree = Doctrine::getTable('MenuItem')->getTree();
      if ($this->isNew())
      {
        $categoryTree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }
     * 
     */
  }     

}
