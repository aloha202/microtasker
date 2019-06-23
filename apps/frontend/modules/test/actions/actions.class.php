<?php

/**
 * test actions.
 *
 * @package    cms
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeIndex(sfWebRequest $request) {
        
    }
    
    public function executeForm(sfWebRequest $request)
    {
        $this->form = new TestForm;
        
        $this->processForm2($this->form, $request, 'Saved');
    }

}
