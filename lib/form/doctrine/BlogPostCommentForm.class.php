<?php

/**
 * BlogPostComment form.
 sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogPostCommentForm extends BaseBlogPostCommentForm
{
  public function configure()
  {
      $this->widgetSchema['comment']->setAttribute('class', 'mceNoEditor');
  }
}
