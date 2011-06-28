<?php

# Url to redirect to when an invalid page has been requested
$REDIRECTION_URL = "http://www.proximity.bbdo.be";

// Default timezone.
date_default_timezone_set('Europe/Brussels');

// Error reporting: report nothing, only fatal errors.
error_reporting(E_ALL & ~E_STRICT & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
// Display the errors when they occur.
ini_set('display_errors', 1);

?>
