<?php

require(dirname(__FILE__) . "/../../libraries/dwoo/dwooAutoload.php");

class ProjectViewer {
	var $folders = array();
	var $tpl_file = "";
	
	function __construct($project_folders, $tpl_file) {
		$this->folders = $project_folders;
		$this->tpl_file = $tpl_file;
	}
	
	function run() {
		$dwoo = new Dwoo(); 
		$tpl = new Dwoo_Template_File($this->tpl_file);
		$data = new Dwoo_Data();
	
		$data->assign("projectList", $this->convertToAssocArray($this->folders));
		
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
}