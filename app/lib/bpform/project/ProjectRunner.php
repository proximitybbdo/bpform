<?php
	
	class ProjectRunner {
		var $project_folder;
		var $watch_folder = "";
		var $deploy_folder = ".deploy/";
		
		var $watcher;
		var $templater;
		
		function __construct($project_folder) {
			$this->project_folder = $project_folder . "/";
		}
		
		function run() {
      $this->watcher = new WatchDeployEngine($this->project_folder . $this->watch_folder, $this->project_folder . $this->deploy_folder);
      $this->watcher->run();

      return $this->watcher->read();  
		}
		
		function setWatchFolder($name) {
			$this->watch_folder = $name;
		}
		
		function setDeployFolder($name) {
			$this->deploy_folder = $name;
    }

    function getDeployFolder() {
      return $this->project_folder . $this->deploy_folder;
    }
	}

?>
