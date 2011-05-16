<?php

class ProjectFolder {
	var $folder_name;
	var $folder_dir;
	var $mod_time;
	var $mod_date;
	
	function __construct($dir) {
		$this->folder_dir = $dir;
		$this->folder_name = substr($dir, strrpos($dir, "/") + 1);
		$this->mod_time = $this->getLastModificationTime($this->folder_dir);
		$this->mod_date = date("F j, Y, g:i a", $this->mod_time);
	}
	
	function getLastModificationTime($path) {
		$allowedExtensions = array('swf', 'jpg', 'jpeg', 'gif', 'png');

		if (!file_exists($path))
			return 0;

		$extension = end(explode(".", $path));     
		
		if (is_file($path) && in_array($extension, $allowedExtensions))
			return filemtime($path);
		
		$ret = 0;

		foreach (glob($path . "/*") as $fn) {
			if ($this->getLastModificationTime($fn) > $ret)
					$ret = $this->getLastModificationTime($fn);
		}

		return $ret;
	}
}

?>