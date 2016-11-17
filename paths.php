<?php
/*$path = $_SERVER['DOCUMENT_ROOT'] . '/10K PhpProjectMiguel/';
define('SITE_ROOT', $path);*/
define('PRODUCTS_LOG_DIR', SITE_ROOT . 'log/products/Site_Products_errors.log');
define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

define('PRODUCTION', true);


//SITE_ROOT
$path=$_SERVER['DOCUMENT_ROOT'].'/proyecto_v3/';
define('SITE_ROOT', $path);

//SITE_PATH
   define('SITE_PATH','http://'.$_SERVER['HTTP_HOST'].'/proyecto_v3/');

//CSS
define('CSS_PATH', SITE_PATH . 'view/css/');

//log
define('LOG_DIR',SITE_ROOT.'classes/log.class.singleton.php');
define('PRODUCTS_LOG_DIR',SITE_ROOT.'log/products/Site_Products_errors.log');
define('GENERAL_LOG_DIR',SITE_ROOT.'log/general/Site_General_errors.log');

//production
define('PRODUCTION',true);

//model
define('MODEL_PATH',SITE_ROOT.'model/');
//view
define('VIEW_PATH_INC',SITE_ROOT.'view/inc/');
define('VIEW_PATH_INC_ERROR',SITE_ROOT.'view/inc/templates_error/');
//modules
define('MODULES_PATH',SITE_ROOT.'modules/');

//resources
define('RESOURCES',SITE_ROOT.'resources/');
//media
define('MEDIA_PATH',SITE_ROOT.'media/');
//utils
define('UTILS',SITE_ROOT.'utils/');

//model specialists
define('FUNCTIONS_PRODUCTS',SITE_ROOT.'modules/products_frontend/utils/');
define('MODEL_PATH_PRODUCTS',SITE_ROOT.'modules/products_frontend/model/');
define('DAO_PRODUCTS',SITE_ROOT.'modules/products_frontend/model/DAO/');
define('BLL_PRODUCTS',SITE_ROOT.'modules/products_frontend/model/BLL/');
define('MODEL_PRODUCTS',SITE_ROOT.'modules/products_frontend/model/model/');
define('PRODUCTS_JS_PATH', SITE_PATH . 'modules/products_frontend/view/js/');
define('PRODUCTS_CSS_PATH', SITE_PATH . 'modules/products_frontend/view/css/');
