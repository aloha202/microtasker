<?php

/**
 * BlogPost filter form.
 *
 * @package    cms
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BlogPostFormFilter extends BaseBlogPostFormFilter
{
  public function configure()
  {
      $this->widgetSchema['date'] = new sfWidgetFormInputRangeDatepicker(array(
          'params' => array(
              'changeYear' => true,
              'changeMonth' => true
          )
      ));
      
  }
}
