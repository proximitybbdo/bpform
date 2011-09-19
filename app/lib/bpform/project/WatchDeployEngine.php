<?php

	class WatchDeployEngine {
		var $watch_folder = "";
    var $deploy_folder = "";
  
    var $db_ready = false;
    var $db_inst;
	
		function __construct($watch_dir, $deploy_dir) {
			$this->watch_folder = $watch_dir;
			$this->deploy_folder = $deploy_dir;
		}
	
    function run() {
      if(!is_dir($this->deploy_folder))
        mkdir($this->deploy_folder);

			if(is_dir($this->watch_folder)) {
        $watch_files = $this->fetch_files($this->watch_folder);

        while($file = current($watch_files)) {
          $hashed = $this->hash_file($this->watch_folder . $file);
          
          if(!$this->file_exists_in_db($hashed)) { // Check if file isn't processed already
            if(file_exists($this->deploy_folder . $file)) // Check if files already exists in deploy
              $this->rename_versioning_file($this->deploy_folder, $file); // First rename

            if(copy($this->watch_folder . $file, $this->deploy_folder . $file)) { // Copy file
              $this->file_save_in_db($hashed); // Save hash of file in db

              touch($this->deploy_folder . $file); // Set modification date to current
            }  
          }

          next($watch_files); // Next
				}
			} else
				throw new Exception("Folders are not valid.");
		}
	
		function read() {
      $deploy_files = $this->fetch_files($this->deploy_folder);
			$deployed_files = array();
			$deployed_versioned_files = array();
		
			// Save versioned 
			while ($file = current($deploy_files)) {
        $banner = new Banner($file);

				if($banner->isVersioned())
					$deployed_versioned_files[count($deployed_versioned_files)] = $banner;
				
				next($deploy_files); // Next file
			}
			
			reset($deploy_files);
			
			// Loop files, skip versioned
			while ($file = current($deploy_files)) {
        $banner = new Banner($file);

				if(!$banner->isVersioned()) {
					$deployed_files[count($deployed_files)] = $banner;
					
					reset($deployed_versioned_files);
					
					while ($version = current($deployed_versioned_files)) {
						if($version->versioned_base == $banner->bannername)
							$banner->addVersion($version);
					
						next($deployed_versioned_files);
					}
				}
				
				next($deploy_files); // Next file
			}
		
			return $deployed_files;
		}
	
		/**
		 * Fetch files from directory.
		 */
		function fetch_files($folder) {
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
		function rename_versioning_file($trgt_dir, $trgt_file) {
			$ctr = 1;
			$name = current(explode(".", $trgt_file));
			$ext = end(explode(".", $trgt_file));
		
			while(file_exists($trgt_dir . $name . "_" . $ctr . "." . $ext))
				$ctr++;

			rename($trgt_dir . $trgt_file, $trgt_dir . $name . "_" . $ctr . "." . $ext);
    }

    function init_db() {
      if(!$this->db_inst) {
        try  {
          $this->db_inst = new PDO('sqlite:clients/banners_files.sqlite');
        } catch(Exception $e) {
          die($e);
        }
      }
      
      if($this->db_inst) {
        if(!$this->db_inst->exec("SELECT * FROM files")) {
          $query = 'CREATE TABLE files (file_hash TEXT)';
                 
          $this->db_inst->exec($query);
        }
      } 
    }

    function file_exists_in_db($hash) {
      $this->init_db(); 

      $query = "SELECT * FROM files WHERE file_hash = '" . $hash . "'";
      $result = $this->db_inst->query($query);
      
      if($this->db_inst->query($query)->fetch())
        return true;

      return false;
    }

    function file_save_in_db($hash) {
      $this->init_db(); 
      
      $query = 'INSERT INTO files (file_hash) VALUES ("' . $hash . '")';

      $this->db_inst->exec($query);
    }

    function hash_file($file) {
      return md5_file($file); 
    }
	}
