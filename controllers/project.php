<?php
include(dirname(dirname(__FILE__)).'/app/lib/swfreader/swfreader.php');

function project() {
  $requested_dir = "clients/" . params('client') . "/" . params('project');
  $banner_get = params('banner');

  if(is_dir($requested_dir)) {
    $bp = new ProjectRunner($requested_dir);
    $files = $bp->run();

    $project_url = isset($banner_get) ? dirname(BASE_PATH_DIR) . '/' : BASE_PATH_DIR;

    set("project_url", $project_url);
    set("project", params('project'));
    set("client", params('client'));
    set("banners_list", $files);

    if(isset($banner_get)) {
      $bf = exists_banner($files, $banner_get);

      if(is_null($bf)) {
        // Could be a versioned file
        $bf = new Banner($banner_get . ".swf");

        if($bf->hasVersions()) {
          $bf_base = exists_banner($files, $bf->versioned_base);

          if(is_null($bf_base))
            $bf = null; // Reset
        }	
      }

      if(!is_null($bf)) {
        // set("banner_get", $bf->bannername);
        set("banner_get", $banner_get);
        set("banner_link", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

        $banner_path = BASE_PATH . $bp->getDeployFolder() . $bf->filename;

        set("banner_has_versions", $bf->hasVersions());


        if($bf->hasVersions()) {
          // set("banner_parent_name", $bf->versioned_base);
          set("banner_parent_name", $bf->bannername);
          set("banners_versions", $bf->versions);

          foreach($bf->versions as $banner) {
            if($banner->bannername == $banner_get) {
              $banner_path = BASE_PATH . $bp->getDeployFolder() . $banner->filename;
            }
          }
        }
      }
    }
  
    set("banner_path", $banner_path);
    set("banner_is_selected", isset($banner_get));

    set("banner_meta", get_banner_meta($_SERVER["DOCUMENT_ROOT"] . _c('root') . $bp->getDeployFolder() . $bf->filename));

    return html('project.html.php', 'layout.html.php');
  } else
    header("Location: " . dirname($_SERVER["REDIRECT_URL"]));
}

function get_banner_meta($file) {
  $meta = new StdClass();

  // Create a new SWF header object
  $swf = new swfheader(false);
  $swf->loadswf($file);

  $meta->version = $swf->version;
  $meta->width = $swf->width;
  $meta->height = $swf->height;
  $meta->size = formatBytes($file, "KB");

  return $meta;
}

/**
* Does given banner exists in deployed files.
*/
function exists_banner($files, $banner) {
  reset($files);

  while ($bf = current($files)) {
    if(	$bf->bannername == $banner) // && $bf->isBanner())
      return $bf;

    if($bf->hasVersions()) {
      foreach ($bf->versions as $version) {
        if($version->bannername == $banner)
          return $bf;
      }
    }

    next($files);
  }

  return NULL;
}
