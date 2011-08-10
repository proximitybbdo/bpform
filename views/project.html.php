<div id="menu">
  <p class="bannerlist">All versions:</p>

  <select id="bannerlist">
    <option value="-">Select banner format</option>
    <? foreach($banners_list as $banner) { ?>
    <option value="<? echo $project_url; ?><? echo $banner->bannername; ?>" <? if($banner->bannername == $banner_get) { ?>selected="selected"<? } ?>><? echo $banner->bannername; ?></option>
    <? } ?> 
  </select>

  <? if($banner_is_selected) { ?>
  <!-- CURRENT BANNER -->
  <ul id="topmenu">
  <? if($banner_has_versions) { ?>
    <li>	
      <p class="bannerversionslist">Has multiple versions:</p>

      <select id="bannerversionslist">
        <option value="-">Select banner version</option>
        <option value="<? echo $project_url; ?><? echo $banner_parent_name; ?>" <? if($banner_parent_name == $banner_get) { ?>selected="selected"<? } ?>>Latest version</option>
        <? foreach($banners_versions as $version) { ?>
        <option value="<? echo $project_url; ?><? echo $version->bannername; ?>" <? if($version->bannername == $banner_get) { ?>selected="selected"<? } ?>>Version "<? echo $version.version_number; ?></option>
        <? } ?>
      </select>
    </li>
    <? } ?>

    <? if($banner_langs) { ?>
    <li><em>switch banner to</em> <? foreach($banner_langs as $lang) { ?><a href="<? echo $project_url; ?><? echo $lang.bannername; ?>"><? echo $lang.bannername; ?></a><? } ?></li>
    <? } ?>
    <li>
      <div class="banner-url">
        <input type="text" onclick="this.select()" id="banner_url" value="<? echo $banner_link; ?>" name="banner_url"/>
      </div>
    </li>
  </ul>
  <!-- CURRENT BANNER -->
  <? } ?>
</div>

<div id="banner">
  
  <? if($banner_is_selected) { ?>
  <div id="tools">
    <a href="#closetools" class="close">X</a>
    <div class="content">
      <h3>Tools</h3>

      <ul>
        <li><a href="#showoutlines">show banner outline</a></li>
      </ul>
    </div>	
  </div>
  <? } ?>
  
  <div class="content">
    <? if($banner_is_selected) { ?>
    
    <!-- CURRENT BANNER -->
    <script type="text/javascript">
      //<![CDATA[
        var flashvars = { 	
          clickTag: "javascript:clicktagTest('clickTag')", 
          clickTAG: "javascript:clicktagTest('clickTAG')", 
          url: "javascript:clicktagTest('url')" 
        };
                  
        var params = { allowFullScreen: true, wmode: "transparent", allowScriptAccess: "always" };
        var attributes = { id: "flash" };
    
        swfobject.embedSWF("<? echo $banner_path; ?>", "flash_alternative", "<? echo $banner_width; ?>", "<? echo $banner_height; ?>", "8.0.0", "<? echo $base_path; ?>assets/swf/expressInstall.swf", flashvars, params, attributes);
      //]]>
    </script>

    <style type="text/css">
      #flash {
        width: <? echo $banner_width; ?>px; 
        height: <? echo $banner_height; ?>px;
      }
    </style>

    <div id="flash_alternative">
      <h4>This preview requires the latest version of the Adobe Flash player</h4>

      <p>Voor deze preview heb je de flash plugin van Adobe nodig. Deze kan je <a href="http://www.adobe.com/go/getflashplayer">hier gratis en snel downloaden</a>.</p>
      <p>Als je zeker bent dat je de flash plugin geinstalleerd hebt kan je kan ook binnengaan zonder <a href="?detectflash=false">flash plugin detectie</a>.</p>
    </div>
    <!-- CURRENT BANNER -->
  
    <? } else { ?>
  
      Select a banner format.
  
    <? } ?> 
  </div>
</div>
