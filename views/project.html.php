<h2><?php echo(ucfirst($client) . ' - ' . $project); ?> <a id="back" href="<?php echo($base_path . $client); ?>">(all projects)</a></h2>
<div id="menu">

  <section class="well bannerlist">
    <p>Select banner format</p>
    <select id="bannerlist">
      <option value="">-- select banner</option>
      <?php foreach($banners_list as $banner) { ?>
      <option value="<?php echo $project_url; ?><?php echo $banner->bannername; ?>" <?php if($banner->bannername == $banner_get) { ?>selected="selected"<?php } ?>><?php echo $banner->bannername; ?></option>
      <?php } ?> 
    </select>
  </section>

  <?php if($banner_has_versions) { ?>
  <section class="well bannerversionslist">
    <p class="bannerversionslist">Has multiple versions:</p>
    <select id="bannerversionslist">
      <option value="<?php echo $project_url; echo $banner_parent_name; ?>" <?php if($banner_parent_name == $banner_get) { ?>selected="selected"<?php } ?>>Latest version</option>
      <?php foreach($banners_versions as $version) { ?>
      <option value="<?php echo $project_url; ?><?php echo $version->bannername; ?>" <?php if($version->bannername == $banner_get) { ?>selected="selected"<?php } ?>>Version <?php echo $version->version_number; ?></option>
      <?php } ?>
    </select>
  </section>
  <?php } ?>

  <?php if($banner_is_selected) { ?>

  <section class="well bannerinfo">
    <ul>
      <li>Flash Player: <strong><?php echo($banner_meta->version); ?></strong></li>
      <li>Width/height: <strong><?php echo($banner_meta->width); ?>px / <?php echo($banner_meta->height); ?>px</strong></li>
      <li>Size: <strong><?php echo($banner_meta->size); ?></strong></li>
    </ul>
  </section>

  <!-- CURRENT BANNER -->
  <ul id="topmenu">

    <?php if($banner_langs) { ?>
    <li><em>switch banner to</em> <?php foreach($banner_langs as $lang) { ?><a href="<?php echo $project_url; ?><?php echo $lang->bannername; ?>"><?php echo $lang->bannername; ?></a><?php } ?></li>
  <?php } ?>
<li>
      <div class="banner-url">
        <form action="#">
          <input type="text" class="xxlarge" onclick="this.select()" id="banner_url" value="<?php echo $banner_link; ?>" name="banner_url" />
        </form>
      </div>
    </li>
  </ul>
  <!-- CURRENT BANNER -->
  <?php } ?>
</div>

  <div id="banner">
  
  <?php if($banner_is_selected) { ?>
  <div id="tools">
      <a href="#closetools" class="close">X</a>
      <div class="content">
        <h3>Tools</h3>

        <ul>
          <li><a href="#showoutlines">show banner outline</a></li>
        </ul>
      </div>	
    </div>
  <?php } ?>
  
  <div class="content">
    <?php if($banner_is_selected) { ?>
    
    <!-- CURRENT BANNER -->
    <script type="text/javascript">
      //<![CDATA[
        var flashvars = { 	
          clickTag: "<?php echo(url_for('/clicktag/clicktag')); ?>", 
          clickTAG: "<?php echo(url_for('/clicktag/clickTAG')); ?>", 
          url:      "<?php echo(url_for('/clicktag/url')); ?>" 
        };

        var params = { allowFullScreen: true, wmode: "transparent", allowScriptAccess: "always" };
        var attributes = { id: "flash" };

        swfobject.embedSWF("<?php echo $banner_path; ?>", "flash_alternative", "<?php echo $banner_meta->width; ?>", "<?php echo $banner_meta->height; ?>", "8.0.0", "<?php echo $base_path; ?>assets/swf/expressInstall.swf", flashvars, params, attributes);
      //]]>
    </script>

    <style type="text/css">
      #flash {
        width: <?php echo $banner_meta->width; ?>px; 
        height: <?php echo $banner_meta->height; ?>px;
      }
    </style>

    <div id="flash_alternative">
      <h4>This preview requires the latest version of the Adobe Flash player</h4>

      <p>Voor deze preview heb je de flash plugin van Adobe nodig. Deze kan je <a href="http://www.adobe.com/go/getflashplayer">hier gratis en snel downloaden</a>.</p>
      <p>Als je zeker bent dat je de flash plugin geinstalleerd hebt kan je kan ook binnengaan zonder <a href="?detectflash=false">flash plugin detectie</a>.</p>
    </div>
    <!-- CURRENT BANNER -->
    <?php } ?> 
  </div>
</div>
