<?php

function project() {
  $requested_dir = "clients/" . params('client') . "/" . params('project');
  $banner_get = params('banner');

  if(is_dir($requested_dir)) {
    $bp = new ProjectRunner($requested_dir);
    $files = $bp->run();

    set("base_path", BASE_PATH);
    
    $dir_url = isset($_SERVER['HTTP_X_ORIGINAL_URL']) ? $_SERVER['HTTP_X_ORIGINAL_URL'] : $_SERVER["REDIRECT_URL"]; 
    $project_url = (isset($banner_get) ? dirname($dir_url) : $dir_url) . "/";

    set("project_url", $project_url);
    set("banners_list", $files);
  
    if(isset($banner_get)) {
      $bf = exists_banner($files, $banner_get);
      
      if(is_null($bf)) {
        // Could be a versioned file
        $bf = new BannerFile($banner_get . ".swf");
        
        if($bf->isVersioned()) {
          $bf_base = exists_banner($files, $bf->versioned_base);
          
          if(is_null($bf_base))
            $bf = null; // Reset
        }	
      }
    
      if(!is_null($bf)) {
        set("banner_get", $bf->bannername);
        set("banner_link", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
      
        set("banner_path", '/' . $bp->getDeployFolder() . $bf->filename);
        set("banner_width", $bf->getWidth());
        set("banner_height", $bf->getHeight());

        set("banner_has_versions", $bf->hasVersions());
        
        if(!is_null($bf_base)) {
          set("banner_has_versions", true);
          
          set("banne_parent_name", $bf_base->bannername);
          set("banners_versions", $bf_base->versions);
        } else {
          set("banne_parent_name", $bf->bannername);
          set("banners_versions", $bf->versions);
        }
      }
    }
  
    set("banner_is_selected", isset($banner_get));

    return html('project.html.php', 'layout.html.php');
  } else
    header("Location: " . dirname($_SERVER["REDIRECT_URL"]));
}

/**
* Does given banner exists in deployed files.
*/
function exists_banner($files, $banner) {
  reset($files);

  while ($bf = current($files)) {
    if(	$bf->bannername == $banner 
      && $bf->isBanner())
      return $bf;

    next($files);
  }

  return NULL;
}
