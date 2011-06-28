<?php

	ob_start();

	require("../config.inc");
	
  require("../libraries/smarty/Smarty.class.php");
	
	function getRealIpAddr() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // Check ip from share internet
			return $_SERVER['HTTP_CLIENT_IP'];
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // Check ip is a pass from a proxy
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else
			return $_SERVER['REMOTE_ADDR'];
	}

  $smarty = new Smarty;
	// $data->assign("projectList", $this->convertToAssocArray($this->folders));

  $smarty->display('../tpl/root.tpl');

?>
