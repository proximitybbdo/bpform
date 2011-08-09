<?php

  require("smarty/Smarty.class.php");

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
      $smarty = new Smarty;
      $smarty->assign("base_path", BASE_PATH);
      // $smarty->assign("base_path", dirname($_SERVER["REQUEST_URI"]) . '/../../../');
      
      $dir_url = isset($_SERVER['HTTP_X_ORIGINAL_URL']) ? $_SERVER['HTTP_X_ORIGINAL_URL'] : $_SERVER["REDIRECT_URL"]; 

			$smarty->assign("projectUrl", (isset($banner_get) ? dirname($dir_url) : $dir_url) . "/");
			$smarty->assign("bannersList", $this->convertToAssocArray($this->files));
		
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
				
					$smarty->assign("bannerGet", $bf->bannername);
					$smarty->assign("bannerLink", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
					// $smarty->assign("banner_langs", );
				
					$smarty->assign("bannerPath", dirname($_SERVER["REQUEST_URI"]) . "/" . $this->deploy_folder . $bf->filename);
					$smarty->assign("bannerWidth", $bf->getWidth());
					$smarty->assign("bannerHeight", $bf->getHeight());
					
					$smarty->assign("bannerHasVersions", $bf->hasVersions());
					
					if(!is_null($bf_base)) {
						$smarty->assign("bannerHasVersions", true);
						
						$smarty->assign("bannerParentName", $bf_base->bannername);
						$smarty->assign("bannersVersions", $this->convertToAssocArray($bf_base->versions));
					} else {
						$smarty->assign("bannerParentName", $bf->bannername);
						$smarty->assign("bannersVersions", $this->convertToAssocArray($bf->versions));
					}
				}
			}
		
			$smarty->assign("bannerIsSelected", isset($banner_get));

      $smarty->display($this->tpl_file); 
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
