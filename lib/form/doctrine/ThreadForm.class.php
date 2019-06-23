<?php

/**
 * Thread form.
 sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ThreadForm extends BaseThreadForm
{
  public function configure()
  {
		$this->widgetSchema->setFormFormatterName('Bootstrap2');
		unset($this['user_id']);
  }
}
