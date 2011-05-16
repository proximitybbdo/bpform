<?php
	
	require("data/BannerFile.php");
	
	require("WatchDeployEngine.php");
	require("TemplateEngine.php");
	
	class BannerPlatform {
		var $project_folder;
		var $watch_folder = "watch/";
		var $deploy_folder = "deploy/";
		
		var $watcher;
		var $templater;
		
		function __construct($project_folder) {
			$this->project_folder = $project_folder . "/";
		}
		
		function run() {
			$this->runWatcher();
			
			$this->runTemplater();
		}
		
		function runWatcher() {
			try {
				$this->watcher = new WatchDeployEngine($this->project_folder . $this->watch_folder, $this->project_folder . $this->deploy_folder);
				$this->watcher->run();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		function runTemplater() {
			try {
				$this->templater = new TemplateEngine($this->watcher->read(), $this->deploy_folder, dirname(__FILE__) . "/../../tpl/project.tpl");
				$this->templater->run($_GET["b"]);
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		function setWatchFolder($name) {
			$this->watch_folder = $name;
		}
		
		function setDeployFolder($name) {
			$this->deploy_folder = $name;
		}
	}

?>