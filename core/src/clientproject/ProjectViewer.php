<?php

  require(dirname(__FILE__) . "/../../libraries/smarty/Smarty.class.php");

  class ProjectViewer {
    var $folders = array();
    var $tpl_file = "";
    
    function __construct($project_folders, $tpl_file) {
      $this->folders = $project_folders;
      $this->tpl_file = $tpl_file;
    }
    
    function run() {
      $smarty = new Smarty;
    
      $smarty->assign("projectList", $this->convertToAssocArray($this->folders));
      
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
  }
