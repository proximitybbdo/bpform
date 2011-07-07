<?php

  # Url to redirect to when an invalid page has been requested
  $REDIRECTION_URL = "http://www.proximity.bbdo.be";

  // Default timezone.
  date_default_timezone_set('Europe/Brussels');

  // Error reporting: report nothing, only fatal errors.
  error_reporting(E_ALL & ~E_STRICT & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
  // Display the errors when they occur.
  ini_set('display_errors', 1);

  $lib_directory = dirname(__FILE__) . '/libraries/';
  set_include_path(get_include_path() . PATH_SEPARATOR . $lib_directory);

  define('BASE_PATH', str_replace('\\', '', dirname(dirname($_SERVER['SCRIPT_NAME'] . '../../'))) . '/../../');

?>
