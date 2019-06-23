<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myCurl
 *
 * @author Alaxa
 */
class myCurl {
   
    
    public static function post($url, $params)
    {
        
    }
    
    public static function get($url, $params)
    {
        
    }
    
    public static function request($url, $params = null, $method = 'POST', $debug = false)
    {
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';        

        $curl = curl_init();
        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params)); // передаём параметры
        } elseif ($method == 'GET') {
            if($params)
                $url .= '?' . http_build_query($params);
        }
        curl_setopt($curl, CURLOPT_URL, $url); // url, куда будет отправлен запрос
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);        
        if(strpos($url, 'https:') !== false){
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        }
        curl_setopt($curl, CURLOPT_USERAGENT, $agent);        
        $result = curl_exec($curl);
        curl_close($curl);


        return $result;        
    }
    
}