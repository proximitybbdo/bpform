<?php

class ClientProjects {
	var $requested_dir;
	var $fetched_folder;
	
	function __construct($client_dir) {
		$this->requested_dir = $client_dir;
	}
	
	function run() {
		// Read all folders from dir
		return $this->fetched_folder = $this->fetchFolders($this->requested_dir);
  }

  /**
   * Converts an object to an associative array
   */
  function convertToAssocArray($input_arr) {
    $arr = array();
    
    reset($input_arr);
    
    while($bf = current($input_arr)) {
      $arred = array();
      
      foreach($bf as $key => $value)
        $arred[$key] = $value;
        
      $arr[count($arr)] = $arred;

      next($input_arr);
    }
    
    return $arr;
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
