<?php

	ob_start();

	require("../config.inc");

	require("../src/clientproject/ClientProjects.php");
	require("../src/clientproject/ProjectViewer.php");

	if(isset($_GET["c"])) {
		// Check authentication
		
		$requested_dir = "../../clients/" . $_GET["c"];
	
		if(is_dir($requested_dir)) { // Client exists
			$cp = new ClientProjects($requested_dir);
			$cp->run();
		} else {
			echo "Client does not exists or you don't have the permission to view the clients project overview.";
		}
	} else {
		header("Location: " . $REDIRECTION_URL);
	}

	ob_end_flush();

?>
