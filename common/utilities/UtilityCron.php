<?php

/**
 * @desc Scan virus for file
 *
 * @author trungtranquoc
 * @date: 14/Apr/2014
 */
namespace common\utilities;

class UtilityCron {
    public $host;
    public $cUrl;
    public $is_ssl = false;
    public $username = '';
    public $password = '';
    public function __construct($url) {
        if($url)
            $this->host = $url;
        if(self::checkSSL($url)) 
            $this->is_ssl = true;
        $this->cUrl = curl_init();
    }
    
    
    /**
     * check link is ssl
     * @param string $url
     * @return boolean
     * @author tuna<tunguyenanh@orenj.com>
     * 
     */
    public static function checkSSL($url) {
        if(!$url) 
            return false;
        $url_info = parse_url($url);
        if(isset($url_info['scheme'])) {
            if($url_info['scheme'] === 'https')
                return true;
            else 
                return false;
        }
        return false;
    }
    
    /**
     * get data content from url
     * @return type
     */
    public function getData(){
        //if($this->is_ssl)
        $userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
        curl_setopt($this->cUrl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($this->cUrl, CURLOPT_HEADER, false);
        curl_setopt($this->cUrl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt ($this->cUrl, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($this->cUrl, CURLOPT_URL, $this->host);
        curl_setopt($this->cUrl, CURLOPT_REFERER, $this->host);
        curl_setopt($this->cUrl, CURLOPT_RETURNTRANSFER, TRUE);
        
        $result = curl_exec($this->cUrl);
        $http_status = curl_getinfo($this->cUrl, CURLINFO_HTTP_CODE);
        $error = curl_error($this->cUrl);
        $return = [
            'error'=>'',
            'error_code'=> $http_status
        ];
        if($error != '') {
            $return['error'] = $error;
        }
        $return['result'] = $result;
        
        return $return;
    }
    
    /**
     * set host
     * @param string $url
     */
    public function setHost($url) {
        if($url)
            $this->host = $url;
        if(self::checkSSL($url)) 
            $this->is_ssl = true;
    }
    
    /**
     * close curl session
     */
    public function __destruct() {
        // close our curl session
        if ($this->cUrl)
            curl_close($this->cUrl);
    }
}
