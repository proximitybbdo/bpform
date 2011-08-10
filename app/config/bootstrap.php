<?php

// Start session
session_start();

// Set include path to include **app/lib** directory
$lib_directory = dirname(__FILE__) . '/../lib/';

set_include_path(get_include_path() . PATH_SEPARATOR . $lib_directory);

// [Limonade PHP](https://github.com/sofadesign/limonade/): the basis of this framework.
require_once('limonade.php');

// Default timezone.
date_default_timezone_set('Europe/Brussels');

// Error reporting: report nothing, only fatal errors.
error_reporting(E_ALL & ~E_STRICT & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
// Display the errors when they occur.
ini_set('display_errors', 1);

// Load all Proximity BBDO libraries.
foreach (glob($lib_directory . 'proximitybbdo/*.php') as $filename)
	require_once($filename);

// Include Zend Loader class.
// Load librarues like this: ``Zend_Loader::loadClass('Zend_Db');``
require_once('Zend/Loader.php');

// Init our skeleton app.
// Optionally pass the path to another config file
ProximityApp::init(dirname(__FILE__) . "/config.yaml");

// Init Proximity Session wrapper
Session::getInstance()->init();
