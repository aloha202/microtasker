<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectHelper
 *
 * @author Алекс
 */
class ProjectHelper {

    protected static function getContext() {
        return sfContext::getInstance();
    }

    protected static function _is_mod_active($mod_action) {
        $context = sfContext::getInstance();
        $splitted = explode('/', $mod_action);
        $mod = array_shift($splitted);
        $action = count($splitted) ? array_shift($splitted) : false;
        if ($action) {
            return $context->getModuleName() == $mod && $context->getActionName() == $action;
        } else {
            return $context->getModuleName() == $mod;
        }
    }

    public static function isModActive($mod_action) {
        if (is_array($mod_action)) {
            foreach ($mod_action as $m_a) {
                if (self::_is_mod_active($m_a)) {
                    return true;
                }
            }
            return false;
        }
        return self::_is_mod_active($mod_action);
    }

    public static function getMenu($root_name, $level = 1, $debug = false) {
        $root = Doctrine::getTable('MenuItem')->findOneByRootName($root_name);
        if (!$root) {
            throw new sfException('Unknown root name ' . $root_name);
        }
        $tree = Doctrine::getTable('MenuItem')->getTree();
        $options = array(
            'root_id' => $root->getRootId(),
            'level' => $level
        );
        $menu = $tree->fetchTree($options);
        $collection = new Doctrine_Collection('MenuItem');
        foreach ($menu as $item) {
            if ($item->getLevel() >= $level) {
                $collection->add($item);
            }
        }
        return $collection;
    }

    public static function setPageActive($page) {
        sfContext::getInstance()->set('current_page', $page);
    }

    public static function isPageActive($page) {
        $context = sfContext::getInstance();
        return ($context->has('current_page')
                && $context->get('current_page')->getId() == $page->getId())
                ||
                ($page->getIsModulePage() && $page->getModuleName() == $context->getModuleName());
    }

    public static function rus_to_translit($string) {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'ZH',
            'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ь' => '', 'Ы' => 'Y', 'Ъ' => '', 'Э' => 'E', 'Ю' => 'YU',
            'Я' => 'YA',
        );

        return strtr($string, $converter);
    }

    public static function rus_to_slugify($string, $delim = '_') {
        $string = self::rus_to_translit($string);

        $string = strtolower($string);
        $string = preg_replace('/\W+/', $delim, $string);

        // trim and lowercase
        $string = strtolower(trim($string, $delim));
        return $string;
    }
    public static function rus_to_slugify_builder($value, $record)
    {
        //return Doctrine_Inflector::urlize($value);

    } 
    
    public static function slugify_ru($string, $delim = '-')
    {
        return self::rus_to_slugify($string, $delim);
    }
    
    
    public static function slug_builder($value, $record)
    {
        
        $lang = MyConfig::get('project_lang');
        if(method_exists('ProjectHelper', 'slugify_' . $lang)){
            return call_user_func('ProjectHelper::slugify_' . $lang, $value);
        }                
        return Doctrine_Inflector::urlize($value);        
        /*
        $modified = $record->getModified();
        if(isset($modified['slug'])){
            if($modified['slug']){
                return $modified['slug'];
            }else{

            }
        }else{
            if($record->getSlug()){
                return $record->getSlug();
            }
        }
        
        return $record->getSlug();        
         * 
         */
    }

    public static function recursive_remove_directory($directory, $empty=FALSE) {
        if (substr($directory, -1) == '/') {
            $directory = substr($directory, 0, -1);
        }
        if (!file_exists($directory) || !is_dir($directory)) {
            return FALSE;
        } elseif (is_readable($directory)) {
            $handle = opendir($directory);
            while (FALSE !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    $path = $directory . '/' . $item;
                    if (is_dir($path)) {
                        self::recursive_remove_directory($path);
                    } else {
                        unlink($path);
                    }
                }
            }
            closedir($handle);
            if ($empty == FALSE) {
                if (!rmdir($directory)) {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    public static function sendEmail($to, $subject, $body, $attach = false) {
        $from = sfConfig::get('app_email_noreply');

       self::XMail($to, $subject, $body, $attach);
    }

    public static function sendAdminEmail($subject, $body, $attach = false) {
        $to = MyConfig::get('administrator_email');
        $from = sfConfig::get('app_email_noreply');
        self::XMail($to, $subject, $body, $attach);
    }
    
    public static function XMail($to, $subj, $text, $filename = false, $copy = false) {
        try {
            if (!empty($_SERVER['SERVER_NAME'])) {
                $server = $_SERVER['SERVER_NAME'];
            } else {
                $server = 'dev2';
            }
            $text = str_replace('src="/uploads/images', 'src="http://' . $server . '/uploads/images', $text);

            $pEmailGmail = MyConfig::get('smtp_mailbox'); //'smtp@dostavka.tk';
            $pPasswordGmail = MyConfig::get('smtp_password');
            ;
            $pFromEmail = MyConfig::get('smtp_mailbox');
            ;
            $pFromName = MyConfig::get('smtp_display_name'); //display name
            /*
              $from_expl = explode(' ', trim($from));
              if(count($from_expl) > 1){
              $pFromName = $from_expl[0];
              $pFromEmail = str_replace(array('<', '>'), '', $from_expl[1]);
              }
             * 
             */

            $pTo = $to; //destination email
            $pSubjetc = $subj; //the subjetc 
            $pBody = $text; //body html
    

            if (!class_exists('Swift_SmtpTransport')) {
                require_once sfConfig::get('sf_lib_dir') . '/vendor/vendor/swiftmailer/swift_required.php';
                /*
                  Swift::autoload('Swift_Transport_SmtpAgent');
                  Swift::autoload('Swift_Transport');
                  Swift::autoload('Swift_Transport_AbstractSmtpTransport');
                  Swift::autoload('Swift_Transport_EsmtpTransport');
                  Swift::autoload('Swift_SmtpTransport');
                  Swift::autoload('Swift_Mailer');
                  Swift::autoload('Swift_Mime_MimeEntity');
                  Swift::autoload('Swift_Mime_SimpleMimeEntity');
                  Swift::autoload('Swift_Mime_MimePart');
                  Swift::autoload('Swift_Mime_SimpleMessage');
                  Swift::autoload('Swift_Message');
                  Swift::autoload('Swift_Attachment');
                 * 
                 */
            }

            $transport = Swift_SmtpTransport::newInstance(MyConfig::get('smtp_server'), MyConfig::get('smtp_port', 465), 'tls')
                    ->setUsername($pEmailGmail)
                    ->setPassword($pPasswordGmail);

            $mMailer = Swift_Mailer::newInstance($transport);

            $mEmail = Swift_Message::newInstance();
            if ($filename) {
                $info = pathinfo($filename);
                $mEmail->attach(new Swift_Attachment(file_get_contents($filename), $info['basename']));
            }

            $mEmail->setSubject($pSubjetc);
            $mEmail->setTo($pTo);
            $mEmail->setFrom(array($pFromEmail => $pFromName));
            $mEmail->setBody($pBody, 'text/html'); //body html	
            if ($copy) {
                $copy = explode(',', $copy);
                $mEmail->setCc($copy);
            }

            return $mMailer->send($mEmail);
        } catch (Exception $e) {
            $err = new EmailError;
            $err->fromArray(array(
                'email_from' => $pFromEmail,
                'email_to' => $to,
                'subject' => $subj,
                'body' => $text,
                'cc' => $copy,
                'file' => $filename,
                'errmes' => $e->getMessage()
            ));
            $err->save();
            return 0;
        }
    }     

    public static function generateEmailAddress() {
        return md5(microtime()) . '@default.org';
    }

    public static function getBanner($banner_place_name) {
        $q = Doctrine::getTable('Banner')
                ->createQuery('b')
                ->where('b.BannerPlace.name = ?', $banner_place_name)
                ->andWhere('b.is_active = ?', true)
                ->orderBy('RAND()')
        ;
        $banner = $q->fetchOne();
        if (!$banner) {
            return '';
        }
        $banner->setViewCount($banner->getViewCount() + 1);
        $banner->save();
        return $banner->getCode();
    }

    public static function pager($model, $pages, $query, $request) {
        $pager = new sfDoctrinePager($model, $pages);
        $pager->setPage($request->getParameter('page'));
        $pager->setQuery($query);
        $pager->init();
        return $pager;
    }

    public static function time($time) {
        return date('H:i', strtotime($time));
    }



    public static function price($val) {
        if (is_object($val)) {
            $val = $val->getPrice();
        }
        return intval($val) . 'p.';
    }

    public static function ru_months_array() {
        return array(
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря'
        );
    }



    public static function getCsvArray($str, $delim = false) {
        if (!$delim) {
            $delim = sfConfig::get('app_csv_delimiter');
        }
        $arr = explode("\n", $str);
        for ($i = 0; $i < count($arr); $i++) {
            $row = explode($delim, $arr[$i]);
            $arr[$i] = $row;
        }
        return $arr;
    }

    public static function giveXlsFromCsv($csv, $name, $stylizer = false) {
        $csv_arr = ProjectHelper::getCsvArray($csv);
        require_once sfConfig::get('sf_lib_dir') . '/vendor/vendor/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $letters = array();

        $x = 0;
        $y = count($csv_arr);
        for ($i = 0; $i < count($csv_arr); $i++) {
            for ($j = 0; $j < count($csv_arr[$i]); $j++) {
                $letter = self::xlsGetLetter($j);
                $cell = $sheet->getCellByColumnAndRow($j, $i + 1);
                $val = $csv_arr[$i][$j];
                $cell->setValue($val);
                $w = isset($letters[$letter]) ? $letters[$letter] : 0;
                if (strlen($val) > $w) {
                    $w = strlen($val);
                }
                $letters[$letter] = $w;
                if (!$x) {
                    //$sheet->getColumnDimension($j)->setWidth(100);
                }
            }
            if (!$x) {
                $x = $j;
            }
        }

        foreach ($letters as $letter => $w) {
            $sheet->getColumnDimension($letter)->setWidth($w);
        }

        if ($stylizer) {
            call_user_func_array('StylizeXls::' . $stylizer, array($sheet, $x, $y));
        }
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        //$file = sfConfig::get('sf_web_dir') . '/uploads/xls/zakaz' . $order->getId() . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $name . '"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }
    
    public static function xlsGetLetter($i) {
        $letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $letter = $letters[$i % count($letters)];
        return str_pad($letter, floor($i / count($letters)) + 1, $letter);
    }    

    public static function getEmailFromObject($object) {
        try {
            return $object->getEmail();
        } catch (Exception $e) {
            
        }
        try {
            return $object->getEmailAddress();
        } catch (Exception $e) {
            
        }
        return '';
    }

    public static function cut($str, $len = 100) {
        $str = strip_tags($str);
        $arr = explode(' ', $str);
        $str2 = '';
        foreach ($arr as $i => $s) {
            $str2 .= ($i ? ' ' : '') . $s;
            if (strlen($str2) >= $len) {
                return $str2 . '...';
            }
        }
        return $str;
    }
    
    public static function is_local()
    {
        return $_SERVER['SERVER_ADDR'] == '127.0.0.1';
    }
    
    public static function is_dev()
    {
        return self::is_local();
    }
    
    public static function is_test()
    {
        return false;
    }
    
    public static function is_live() {
        return $_SERVER['SERVER_NAME'] == sfConfig::get('app_live_server')
                || $_SERVER['SERVER_NAME'] == 'www.' . sfConfig::get('app_live_server')
        ;
    } 
    
    protected static $appRouting = array();

    public static function generateApplicationUrl($application, $name, $parameters = array()) {
        return self::getAppRouting($application)->generate($name, $parameters);
    }

    protected static function getAppRouting($application) {
        if (empty(self::$appRouting[$application])) {
            self::$appRouting[$application] = new sfPatternRouting(new sfEventDispatcher());

            $config = new sfRoutingConfigHandler();
            $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir') . '/' . $application . '/config/routing.yml'));

            self::$appRouting[$application]->setRoutes($routes);
        }

        return self::$appRouting[$application];
    }
    
    
    public static function banIpAddress($reason = null)
    {
        $bannedIp = new BannedIp;
        $bannedIp->fromArray(array(
           'ip' => $_SERVER['REMOTE_ADDR'],
            'reason' => $reason
        ));
        $bannedIp->save();
        Notifier::notify('666', 'Заблокирован айпи адрес');
        self::forward_banned_ip();
    }
    
    public static function isIpBanned()
    {
        $interval = MyConfig::get('ip_ban_lifetime', '1 HOUR');
        $q = Q::c('BannedIp', 'i')
                ->where('i.ip = ?', $_SERVER['REMOTE_ADDR'])
                ->addWhere("i.created_at > DATE_SUB(NOW(), INTERVAL $interval)")
                ;
        $banned_ip = $q->fetchOne();
        if($banned_ip)
        {
            self::getContext()->getUser()->setAttribute('banned_ip_id', $banned_ip->getId());
            return true;
        }
        return false;
    }
    
    public static function forward_banned_ip()
    {
        $context = sfContext::getInstance();
        $res = $context->checkModuleAction('default', 'ipBanned');
        if(!$res){
            $context->getController()->redirect('default/ipBanned');
        }
         //   
        
    }
    
  public static function asPhp($variable)
  {
    return str_replace(array("\n", 'array ('), array('', 'array('), var_export($variable, true));
  }    

}
