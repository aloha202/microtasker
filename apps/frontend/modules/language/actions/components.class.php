<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Алша
 */
class languageComponents extends sfComponents {

    public function executeLanguage() {
        $this->form = new sfFormLanguage(
                        $this->getUser(),
                        array('languages' => CmsLanguageTable::getActiveArray())
        );
    }

}