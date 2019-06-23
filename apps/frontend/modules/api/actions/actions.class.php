<?php

/**
 * api actions.
 *
 * @package    cms
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }
    
    public function executeTranslate(sfWebRequest $request){
        $key = $request->getParameter('key');
        $value = $request->getParameter('value');
        
        $file = @file_get_contents('translate.txt') ?: '';
        $file .= "\n$key:$value";
        file_put_contents('translate.txt', $file);
        return sfView::NONE;
    }
    
    public function executeTranslationScript()
    {
        $dictionary = TextHelper::getDictionary();
        $script = "var dictionary = " . $dictionary . ";\n";
        $script .= file_get_contents(sfConfig::get('sf_web_dir') . '/js/jquery.js');
        $script .= file_get_contents(sfConfig::get('sf_web_dir') . '/public/favelets/translate.js');
        
        $this->getResponse()->setContentType('text/javascript');
        return $this->renderText($script);
    }

}
