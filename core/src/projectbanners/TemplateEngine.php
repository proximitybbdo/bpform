<?php

	require(dirname(__FILE__) . "/../../libraries/dwoo/dwooAutoload.php");

	class TemplateEngine {
		var $files = array();
		var $tpl_file = "";
		var $deploy_folder = "";
		var $project_folder = "";
	
		function __construct($deployed_files, $deploy_folder, $tpl_file) {
			$this->files = $deployed_files;
			$this->deploy_folder = $deploy_folder;
			$this->tpl_file = $tpl_file;
		}
	
		function run($banner_get) {
			$dwoo = new Dwoo(); 
			$tpl = new Dwoo_Template_File($this->tpl_file);
			$data = new Dwoo_Data();

			$data->assign("projectUrl", (isset($banner_get) ? dirname($_SERVER["REDIRECT_URL"]) : $_SERVER["REDIRECT_URL"]) . "/");
			$data->assign("bannersList", $this->convertToAssocArray($this->files));
		
			if(isset($banner_get)) {
				$bf = $this->existsBanner($banner_get);
				
				if(is_null($bf)) {
					// Could be a versioned file
					$bf = new BannerFile($banner_get . ".swf");
					
					if($bf->isVersioned()) {
						$bf_base = $this->existsBanner($bf->versioned_base);
						
						if(is_null($bf_base)) {
							$bf = null; // Reset
						}
					}	
				}
			
				if(!is_null($bf)) {
					// var_dump($bf);
				
					$data->assign("bannerGet", $bf->bannername);
					$data->assign("bannerLink", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
					// $data->assign("banner_langs", );
				
					$data->assign("bannerPath", dirname($_SERVER["REQUEST_URI"]) . "/" . $this->deploy_folder . $bf->filename);
					$data->assign("bannerWidth", $bf->getWidth());
					$data->assign("bannerHeight", $bf->getHeight());
					
					$data->assign("bannerHasVersions", $bf->hasVersions());
					
					if(!is_null($bf_base)) {
						$data->assign("bannerHasVersions", true);
						
						$data->assign("bannerParentName", $bf_base->bannername);
						$data->assign("bannersVersions", $this->convertToAssocArray($bf_base->versions));
					} else {
						$data->assign("bannerParentName", $bf->bannername);
						$data->assign("bannersVersions", $this->convertToAssocArray($bf->versions));
					}
				}
			}
		
			$data->assign("bannerIsSelected", isset($banner_get));
		
			$dwoo->output($tpl, $data);
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
	
		/**
		 * Does given banner exists in deployed files.
		 */
		function existsBanner($banner) {
			reset($this->files);
		
			while ($bf = current($this->files)) {
				if(	$bf->bannername == $banner 
					&& $bf->isBanner())
					return $bf;
			
				next($this->files);
			}
		
			return NULL;
		}
	}