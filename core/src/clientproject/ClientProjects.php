<?php

require("ProjectFolder.php");

class ClientProjects {
	var $requested_dir;
	var $fetched_folder;
	
	function __construct($client_dir) {
		$this->requested_dir = $client_dir;
	}
	
	function run() {
		// Read all folders from dir
		$this->fetched_folder = $this->fetchFolders($this->requested_dir);
		
		$pv = new ProjectViewer($this->fetched_folder, dirname(__FILE__) . "/../../tpl/projects.tpl");
		$pv->run();
	}
	
	function fetchFolders($path) {
		$files = array();
		
		if ($dir = opendir($path)) {
			while ($file = readdir($dir)) {
				clearstatcache();

				if(is_dir($path . "/" . $file) && $file != "." && $file != "..")
					$files[count($files)] = new ProjectFolder($this->requested_dir . "/" . $file);
			}
			
			closedir($dir);
		}
		
		return $files;
	}
}

?>