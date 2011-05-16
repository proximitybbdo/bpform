<?php

	ob_start();

	require("../config.inc");
	
	require("../libraries/dwoo/dwooAutoload.php");
	
	function getRealIpAddr() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // Check ip from share internet
			return $_SERVER['HTTP_CLIENT_IP'];
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // Check ip is a pass from a proxy
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else
			return $_SERVER['REMOTE_ADDR'];
	}

	$dwoo = new Dwoo(); 
	$tpl = new Dwoo_Template_File("../tpl/root.tpl");
	$data = new Dwoo_Data();

	// $data->assign("projectList", $this->convertToAssocArray($this->folders));

	$dwoo->output($tpl, $data);

?>