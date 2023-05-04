<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);

define('BASE_URL', $_SERVER['DOCUMENT_ROOT']);

define('VIEW_PATH', BASE_URL  . DS . 'views');
define('ERRORS_VIEW_PATH', BASE_URL  . DS . 'views' . DS . 'errors');

define('CONTROLLERS_PATH', BASE_URL  . DS . 'Http' . DS . 'controllers');
define('MODELS_PATH', BASE_URL  . DS . 'Http' . DS . 'models');
define('UTILS_PATH', BASE_URL  . DS . 'Http' . DS . 'Utils');
define('ASSETS_PATH', BASE_URL  . DS . 'Assets');
define('UPLOAD_BASE_NAME', 'uploads');

$current_user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

require_once BASE_URL . DS . 'bootstrap' . DS . 'autoload.php';

require_once BASE_URL . DS . 'routes' . DS . 'web.php';

$payloads = isset($GLOBALS['payloads']) ? $GLOBALS['payloads'] : null;

if (!$payloads) {
    return require ERRORS_VIEW_PATH . DS . '404.php';
}

$pageTitle = $payloads['title'];

$view = $payloads['view_path'];

$context = $payloads['context'];

require 'views/index.php';
