<?php

// Basic config files needed to boot the application.
require_once('app/config/bootstrap.php');
require_once('app/config/helpers.php');
require_once('app/config/routes.php');

// You can place all the Zend libraries here, you want to be loaded.
Zend_Loader::loadClass('Zend_Db');

foreach (glob($lib_directory . 'bpform/client/*.php') as $filename)
  require_once($filename);

foreach (glob($lib_directory . 'bpform/project/*.php') as $filename)
  require_once($filename);

// Default configuration. You probably won't need to change any of this.
function configure() {
  // Define the base path based on the index.php file (and its location)
  define('BASE_PATH', str_replace('\\', '', dirname(dirname($_SERVER['SCRIPT_NAME']) . '/.') ) . (isset($_SERVER['HTTP_X_ORIGINAL_URL']) ? '/' : ''));
  define('BASE_PATH_DIR', isset($_SERVER['HTTP_X_ORIGINAL_URL']) ? $_SERVER['HTTP_X_ORIGINAL_URL'] . '/' : $_SERVER["REDIRECT_URL"]);

  // Environment variable. You could use this to take different actions when on production or development environment.
  option('env', ENV_DEVELOPMENT);
  option('base_uri', BASE_PATH);
}

// Run it!
run();
