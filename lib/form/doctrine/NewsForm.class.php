<?php

/**
 * News form.
 *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm {

    public function configure() {
        $this->embedCalendar('date');
        
    }

    public function updateObject($values = null) {
        $object = parent::updateObject($values);
        //$object->setSlug(ProjectHelper::rus_to_slugify($object->getTitle(), '-'));
        return $object;
    }

}
