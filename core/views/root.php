<?php

	ob_start();

	require("../config.inc");
  require("smarty/Smarty.class.php");
	
	function getRealIpAddr() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // Check ip from share internet
			return $_SERVER['HTTP_CLIENT_IP'];
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // Check ip is a pass from a proxy
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else
			return $_SERVER['REMOTE_ADDR'];
	}

  $smarty = new Smarty;
	$smarty->assign("base_path", BASE_PATH);

  $smarty->display('../tpl/root.tpl');

?>
