<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Proximity BBDO Banner Platform</title>
	
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="revisit-after" content="31 Days" />
	<meta name="expires" content="never" />
	
	<link rel="shortcut icon" href="{$base_path}html/assets/img/favico.png" />
	
	<link href="{$base_path}html/assets/css/config.css" rel="stylesheet" type="text/css" media="screen, projection" />
	<link href="{$base_path}html/framework/css/print.css" rel="stylesheet" type="text/css" media="print" />
	
	<!--[if IE]><link rel="stylesheet" href="{$base_path}html/assets/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="{$base_path}html/assets/css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	
	<script src="{$base_path}html/framework/js/jquery.min.js" type="text/javascript"></script>
	<script src="{$base_path}html/framework/js/swfobject.js" type="text/javascript"></script>
	
	<script src="{$base_path}html/assets/js/jquery.dotimeout.js" type="text/javascript"></script>
	
	<script src="{$base_path}html/assets/js/base.js" type="text/javascript"></script>
	
	<!--[if lt IE 7]>
		<script src="{$base_path}html/framework/js/DD_belatedPNG.0.0.8a-min.js" type="text/javascript"></script>
		<script type="text/javascript">
			DD_belatedPNG.fix('*'); /* BE MORE SPECIFIC USING CLASSNAME OR ID */
		</script>
	<![endif]-->	
    
</head>
	<body>
	
		<h1>Proximity BBDO</h1>

		<div id="menu">
			<p class="bannerlist">All versions:</p>
			<select id="bannerlist">
				<option>Select banner format</option>
				{foreach from=$bannersList item=banner}
	 			<option value="{$projectUrl}{$banner.bannername}" {if $banner.bannername eq $bannerGet}selected="selected"{/if}>{$banner.bannername}</option>
				{/foreach}
			</select>
		
			{if $bannerIsSelected}
			<!-- CURRENT BANNER -->
			<ul id="topmenu">
				{if $bannerHasVersions}
				<li>	
					<p class="bannerversionslist">Has multiple versions:</p>
					<select id="bannerversionslist">
						<option>Select banner version</option>
						<option value="{$projectUrl}{$bannerParentName}" {if $bannerParentName eq $bannerGet}selected="selected"{/if}>Latest version</option>
						{foreach from=$bannersVersions item=version}
			 			<option value="{$projectUrl}{$version.bannername}" {if $version.bannername eq $bannerGet}selected="selected"{/if}>Version {$version.version_number}</option>
						{/foreach}
					</select>
				</li>
				{/if}
				{if $bannerLangs}
				<li><em>switch banner to</em> {foreach from=$bannerLangs item=lang}<a href="{$projectUrl}{$lang.bannername}">{$lang.bannername}</a>{/foreach}</li>
				{/if}
				<li>
					<div class="banner-url">
						<input type="text" onclick="this.select()" id="banner_url" value="{$bannerLink}" name="banner_url"/>
					</div>
				</li>
			</ul>
			<!-- CURRENT BANNER -->
			{/if}
		</div>
		
		<div class="clear">&nbsp;</div>

		<div id="banner">
			
			{if $bannerIsSelected}
			<div id="tools">
				<a href="#closetools" class="close">X</a>
				<div class="content">
					<h3>Tools</h3>
					<ul>
						<li><a href="#showoutlines">show banner outline</a></li>
					</ul>
				</div>	
			</div>
			{/if}
			
			<div class="content">
				{if $bannerIsSelected}
				
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
				
						swfobject.embedSWF("{$bannerPath}", "flash_alternative", "{$bannerWidth}", "{$bannerHeight}", "8.0.0", "{$base_path}html/assets/swf/expressInstall.swf", flashvars, params, attributes);
					//]]>
				</script>
		
				<style type="text/css">
					#flash {
						width: {$bannerWidth}px; 
						height: {$bannerHeight}px;
					}
				</style>
		
				<div id="flash_alternative">
					<h4>This preview requires the latest version of the Adobe Flash player</h4>
					<p>Voor deze preview heb je de flash plugin van Adobe nodig. Deze kan je <a href="http://www.adobe.com/go/getflashplayer">hier gratis en snel downloaden</a>.</p>
					<p>Als je zeker bent dat je de flash plugin geinstalleerd hebt kan je kan ook binnengaan zonder <a href="?detectflash=false">flash plugin detectie</a>.</p>
				</div>
				<!-- CURRENT BANNER -->
			
				{else}
			
					Select a banner format.
			
				{/if}
			</div>
		</div>
		
		<div id="footer">
			<div class="content">Are you experiencing problems? <a href="mailto:pieter.michels@proximity.bbdo.be">Contact us</a> and we will help you further.</div>
		</div>
		
	</body>
</html>
