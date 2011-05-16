<?php

	/** Old
	ob_start();

	require("../../../core/BannerPlatform.php");
	
	$bp = new BannerPlatform(dirname(__FILE__));
	$bp->run();
	
	ob_end_flush();
	*/

	ob_start();
	
	require("../config.inc");

	require("../src/projectbanners/BannerPlatform.php");

	if(isset($_GET["c"]) && isset($_GET["p"])) {
		$requested_dir = "../../clients/" . $_GET['c'] . "/" . $_GET['p'];

		if(is_dir($requested_dir)) {
			$bp = new BannerPlatform($requested_dir);
			$bp->run();
		} else {
			header("Location: " . dirname($_SERVER["REDIRECT_URL"]));
		}
	} else {
		header("Location: " . $REDIRECTION_URL);
	}
	
	ob_end_flush();

?>