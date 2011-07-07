<?php

	class WatchDeployEngine {
		var $watch_folder = "";
		var $deploy_folder = "";
	
		function __construct($watch_dir, $deploy_dir) {
			$this->watch_folder = $watch_dir;
			$this->deploy_folder = $deploy_dir;
		}
	
		function run() {
			if (is_dir($this->watch_folder) && is_dir($this->deploy_folder)) {
				$watch_files = $this->fetchFiles($this->watch_folder);

				while ($file = current($watch_files)) {
					// Check if files exists in deploy
					if(file_exists($this->deploy_folder . $file))
						$this->renameVersioningFile($this->deploy_folder, $file); // First rename

          // Move file
          if(copy($this->watch_folder . $file, $this->deploy_folder . $file)) {
            unlink($this->watch_folder . $file);
          
            // Set modification date to current
            touch($this->deploy_folder . $file);
          }  
					// Next
          next($watch_files);
				}
			} else {
				throw new Exception("Folders are not valid.");
			}	
		}
	
		function read() {
			$deploy_files = $this->fetchFiles($this->deploy_folder);
			$deployed_files = array();
			$deployed_versioned_files = array();
		
			// Save versioned 
			while ($file = current($deploy_files)) {
				$banner = new BannerFile($file);
				
				if($banner->isVersioned()) {
					$deployed_versioned_files[count($deployed_versioned_files)] = $banner;
				}
				
				next($deploy_files);
			}
			
			reset($deploy_files);
			
			// Loop files, skip versioned
			while ($file = current($deploy_files)) {
				$banner = new BannerFile($file);
				
				if(!$banner->isVersioned()) {
					$deployed_files[count($deployed_files)] = $banner;
					
					reset($deployed_versioned_files);
					
					while ($version = current($deployed_versioned_files)) {
						if($version->versioned_base == $banner->bannername) {
							$banner->addVersion($version);
						}
					
						next($deployed_versioned_files);
					}
				}
				
				next($deploy_files);
			}
		
			return $deployed_files;
		}
	
		/**
		 * Fetch files from directory.
		 */
		function fetchFiles($folder) {
			$files = array();
		
			if ($dir = opendir($folder)) {
				while ($file = readdir($dir)) {
					clearstatcache();
				
					if(is_file($folder . $file) && $file != ".DS_Store")
						$files[count($files)] = $file;
				}
			
				closedir($dir);
			}
		
			return $files;
		}
	
		/**
		 * Rename files with versioning check
		 */
		function renameVersioningFile($trgt_dir, $trgt_file) {
			$ctr = 1;
			$name = current(explode(".", $trgt_file));
			$ext = end(explode(".", $trgt_file));
		
			while(file_exists($trgt_dir . $name . "_" . $ctr . "." . $ext))
				$ctr++;

			rename($trgt_dir . $trgt_file, $trgt_dir . $name . "_" . $ctr . "." . $ext);
		}
	}
