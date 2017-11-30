<?php
define('APPLICATION_PATH', str_replace(['\\','common/config'], ['/',''], __DIR__));

$server = $_SERVER;
define('SCHEME',isset($server['REQUEST_SCHEME']) ? $server['REQUEST_SCHEME'] : (isset($server['HTTPS']) && $server['HTTPS'] == 'on' ? 'https' : 'http'));
define('REQUEST_URI',$server['REQUEST_URI']);
define('PHP_SELF', phpself($server));
define('DOMAIN',$server['HTTP_HOST']);
define('DOMAIN_SERVER',phpdomain($server));
define('HTTP_HOST', SCHEME . '://' . DOMAIN . (PHP_SELF ? '/' . PHP_SELF : ''));
define('HOST_PUBLIC', 'http://' . DOMAIN_SERVER . PHP_SELF);

/*WEB NAME IN DIRECTORY APPLICATION*/
define('WEBSERVER', phpwebname($server));
define('WEBNAME', WEBSERVER ? WEBSERVER : WEB_MAIN);
/*CONFIG MAIN_LOCAL*/
$web_type = phpwebtype();
define('DIRECTORY_MAIN', $web_type . '/');
define('DIRECTORY_MAIN_2', $web_type);
define('MAIN_ROUTE', WEB_TYPE != '' ? '/' . WEB_TYPE : '');
define('LANGUAGE', 'en');
define('VERSION', "1.0");

/*CONFIG FORMAT DATE*/
define('FORMAT_DATE', 'd-m-Y');
define('FORMAT_DATE_INPUT', 'dd-mm-yyyy');
define('FORMAT_DATETIME_INPUT', 'MM/DD/YYYY h:mm A');
define('FORMAT_DATETIME', 'm/d/Y h:i A');


/*CONFIG TYPE USER IN table user*/
define('APP_TYPE_USER', 1);
define('APP_TYPE_ADMIN', 3);
define('APP_TYPE_MC', 6);

/*MIN FILE CSS JAVASCRIPT '' or '.min'*/
define('MIN_MEDIA_FILES', '');

/*UPLOAD FILE*/
define('HOST_MEDIA_LINK', 'http://dev-metrixa.com');
define('HOST_MEDIA', HOST_MEDIA_LINK . '/upload/');
define('HOST_MEDIA_IP', HOST_MEDIA_LINK .  '/upload/');
define('HOST_MEDIA_IMAGES', HOST_MEDIA_LINK .  '/images/');
define('HOST_MEDIA_SWF', HOST_MEDIA_LINK .  '/images/');
define('HOST_MEDIA_FILES', HOST_MEDIA_LINK .  '/files/');
define('HOST_MEDIA_RESIZE', APPLICATION_PATH . '/images/');
//define('HOST_MEDIA_RESIZE', false);
define('DS', '/');


define('MAX_BUTTON_PAGE', 5);
define('CURRENCY_CODE', 'AUD');
define('CURRENCY_DISPLAYED', 'AUD$');

/*CONFIG ANGULARJS*/
define('ANGULARJS', false);
define('ANGULARJS_WRITEFILE', false);

define('LINK_PUBLIC', '/application/' . WEBNAME . '/public/');
define('DIR_LINKPUBLIC', APPLICATION_PATH . '/application/' . WEBNAME . '/public/');
define('DIR_LINKPUBLIC_PARTIAL', DIR_LINKPUBLIC . '/partials/');

/*DEFINE DEFAULT PRE*/
define('CATEGORY', 'category');
define('AUTHOR', 'author');

define('HOST_CRM', 'http://dev.metrixa-crm.com');
define('HOST_CRM_USER', 'admin');
define('V_ASSIGNED_USER', 'Newlead');
define('HOST_CRM_ACCESSKEY', 'Q2UxgjTBSV8VCGDV');

define('BASE_MIN', '');
define('API_BLOG','http://dev-cms.com/api/subscriber');
define('URL_AUTHEN',HOST_PUBLIC.'/oauth');
define('URL_SERVICE', 'http://www.metrixa.com/LinkService/MccService.svc?wsdl');

define('DEVELOPER_TOKEN', 'h2opFTV_dpcD_n-zYZvivg');
define('USER_AGENT', 'METRIXA AUDIT');