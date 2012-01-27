<?php

// Basic config files needed to boot the application.
require_once('app/config/bootstrap.php');
require_once('app/config/helpers.php');
require_once('app/config/routes.php');

// You can place all the Zend libraries here, you want to be loaded.
Zend_Loader::loadClass('Zend_Db');

foreach (glob($lib_directory . 'bpform/*/*.php') as $filename)
  require_once($filename);

// Default configuration. You probably won't need to change any of this.
function configure() {
  // Define the base path based on the index.php file (and its location)
  $base_path = str_replace('\\', '', dirname(dirname($_SERVER['SCRIPT_NAME']) . '/.') ) . '/';
  define('BASE_PATH', singulate_trailing_slashes($base_path));

  // Define the base dir based on the current url
  $base_path_dir = (isset($_SERVER['HTTP_X_ORIGINAL_URL']) ? $_SERVER['HTTP_X_ORIGINAL_URL'] . '/' : $_SERVER["REDIRECT_URL"]) . '/';
  define('BASE_PATH_DIR', singulate_trailing_slashes($base_path_dir));

  // Environment variable. You could use this to take different actions when on production or development environment.
  option('env', ENV_DEVELOPMENT);
  option('base_uri', BASE_PATH);
}

function singulate_trailing_slashes($path) {
  while(substr($path, -1) == '/')
    $path = substr($path, 0, -1);

  return $path . '/';
}

// function for errors
function not_found($errno, $errstr, $errfile=null, $errline=null) {
    set('errno', $errno);
    set('errstr', $errstr);
    set('errfile', $errfile);
    set('errline', $errline);
    return html("error.html.php");
}

// Run it!
run();

