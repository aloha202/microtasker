<?php

/**
 * blog actions.
 *
 * @package    cms
 * @subpackage blog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blogActions extends myActions
{
public function preExecute()
{
      $this->processPage('blog');
}
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_posts = Doctrine_Core::getTable('BlogPost')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->blog_post = Doctrine_Core::getTable('BlogPost')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->blog_post);
    Breadcrumbs::add(array($this->blog_post));
    //$this->getResponse()->addTitle($this->blog_post->getMetaTitle());      
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogPostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BlogPostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_post = Doctrine_Core::getTable('BlogPost')->find(array($request->getParameter('id'))), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($blog_post = Doctrine_Core::getTable('BlogPost')->find(array($request->getParameter('id'))), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_post = Doctrine_Core::getTable('BlogPost')->find(array($request->getParameter('id'))), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $blog_post->delete();

    $this->redirect('blog/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_post = $form->save();

      $this->redirect('blog/edit?id='.$blog_post->getId());
    }
  }

/* --- ACTIONS --- */

}
