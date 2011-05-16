<?php 

	class BannerFile {
		var $bannername = "";
		var $filename = "";
		var $name = "";
		var $size = array();
		var $lang = "";
		var $ext = "";
	
		var $BANNER_EXT = "swf";
		
		var $versioned = false;
		var $versioned_base = "";
		var $version_number = 0;
		var $versions = array();
	
		function __construct($file) {
			$splitted_ext = explode(".", $file);
			$splitted = explode("_", $splitted_ext[0]);
		
			$this->filename = $file;
			$this->bannername = $splitted_ext[0];
		
			$this->ext = $splitted_ext[1];
			$this->name = $splitted[0];
			$this->size = explode("x", $splitted[1]);
			$this->lang = strtoupper($splitted[2]);
			
			// Check if versioned file
			$this->versioned = is_numeric($splitted[count($splitted) - 1]);
			$this->version_number = intval($splitted[count($splitted) - 1]);
			
			if($this->isVersioned()) {
				array_pop($splitted);
				
				$this->versioned_base = implode("_", $splitted);
			}
		}
		
		function isVersioned() {
			return $this->versioned;
		}
		
		function hasVersions() {
			return count($this->versions) > 0;
		}
		
		function addVersion($banner) {
			$this->versions[count($this->versions)] = $banner;
		}
	
		function isBanner() {
			return strtolower($this->ext) == $this->BANNER_EXT;
		}
	
		function getWidth() {
			return $this->size[0];
		}
	
		function getHeight() {
			return $this->size[1];	
		}
	}