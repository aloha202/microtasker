<?php

/**
 * _system actions.
 *
 * @package    cms
 * @subpackage _system
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class _systemActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }
    
    public function executeLocalizationToolbar()
    {
        $js = "var dev2_langs=" . json_encode(sfConfig::get('app_langs_all')) . ";\n";
        $js .= file_get_contents(sfConfig::get('sf_web_dir') . '/js/jquery.js');
        $js .= file_get_contents(dirname(__FILE__) . '/../templates/localizationToolbar.js');
        return $this->renderText($js);
    }
    
    public function executeLocalizationStart(sfWebRequest $request)
    {
        $lang = $request->getParameter('lang');
        $json = LocalizationTable::getDictionaryJson($lang, $request->hasParameter('force_overwrite'));
        $js = "var dev2_dictionary=" . $json . ";\n";
        $js .= "var dev2_lang = '$lang';\n";
        $js .= file_get_contents(dirname(__FILE__) . '/../templates/localizationStart.js');
        return $this->renderText($js);
    }
    
    public function executeLocalizationProcess(sfWebRequest $request)
    {
        $loc = Q::f('Localization', $request->getParameter('id'));
        $this->forward404Unless($loc);
        
        $value = $request->getParameter('value');
        $value = TextHelper::normalize($value);
        $loc->set($request->getParameter('lang'), $value);
        $loc->save();
        $index = intval($request->getParameter('index'));
        $index++;
        return $this->renderText("translate($index);");
    }
    
    public function executeLang(sfWebRequest $request)
    {
        $lang = $request->getParameter('lang');
        $langs = sfConfig::get('app_langs_all');
        if(!isset($langs[$lang])){
            return $this->redirect($request->getReferer());
        }
        $_SESSION['lang'] = $lang;
        $this->getUser()->signOut();
        return $this->redirect('@homepage');
    }
    
    public function executeFix(sfWebRequest $request)
    {
        $q = Q::c("TextBlock", "b")
                ->where("b.id > ?", 7);
        foreach($q->execute() as $tb){
            $ntb = Q::f('TextBlock', $tb->getId() + 1);
            if($ntb){
                $tb->setText($ntb->getText());
            }else{
                $tb->setText(null);
            }
            $tb->save();
        }
    }

}
