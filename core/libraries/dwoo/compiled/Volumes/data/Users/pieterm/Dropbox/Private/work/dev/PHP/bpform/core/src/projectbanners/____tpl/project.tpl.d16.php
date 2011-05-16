<?php
ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Proximity BBDO Banner Platform</title>
	
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="revisit-after" content="31 Days" />
	<meta name="expires" content="never" />
	
	<meta name="keywords" content="ProximityBBDO" />
	<meta name="description" content="ProximityBBDO" />	
	
	<link rel="shortcut icon" href="/html/assets/img/favico.png" />
	
	<link href="/html/assets/css/config.css" rel="stylesheet" type="text/css" media="screen, projection" />
	<link href="/html/framework/css/print.css" rel="stylesheet" type="text/css" media="print" />
	
	<!--[if IE]><link rel="stylesheet" href="/html/assets/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="/html/assets/css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	
	<script src="/html/framework/js/jquery.min.js" type="text/javascript"></script>
	<script src="/html/framework/js/swfobject.js" type="text/javascript"></script>
	
	<script src="/html/assets/js/jquery.dotimeout.js" type="text/javascript"></script>
	
	<script src="/html/assets/js/base.js" type="text/javascript"></script>
	
	<!--[if lt IE 7]>
		<script src="/html/framework/js/DD_belatedPNG.0.0.8a-min.js" type="text/javascript"></script>
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
				<?php 
$_loop0_data = (isset($this->scope["bannersList"]) ? $this->scope["bannersList"] : null);
if ($this->isArray($_loop0_data) === true)
{
	foreach ($_loop0_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop0_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
	 			<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'projectUrl',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), false);
echo $this->scope["bannername"];?>" <?php if ((isset($this->scope["bannername"]) ? $this->scope["bannername"] : null) == $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'bannerGet',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), true)) {
?>selected="selected"<?php 
}?>><?php echo $this->scope["bannername"];?></option>
				<?php 
/* -- loop end output */
		$this->setScope($_loop0_scope, true);
	}
}
?>

			</select>
		
			<?php if ((isset($this->scope["bannerIsSelected"]) ? $this->scope["bannerIsSelected"] : null)) {
?>
			<!-- CURRENT BANNER -->
			<ul id="topmenu">
				<?php if ((isset($this->scope["bannerHasVersions"]) ? $this->scope["bannerHasVersions"] : null)) {
?>
				<li>	
					<p class="bannerversionslist">Has multiple versions:</p>
					<select id="bannerversionslist">
						<option>Select banner version</option>
						<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'projectUrl',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), false);
echo $this->scope["bannerParentName"];?>" <?php if ((isset($this->scope["bannerParentName"]) ? $this->scope["bannerParentName"] : null) == $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'bannerGet',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), true)) {
?>selected="selected"<?php 
}?>>Latest version</option>
						<?php 
$_loop1_data = (isset($this->scope["bannersVersions"]) ? $this->scope["bannersVersions"] : null);
if ($this->isArray($_loop1_data) === true)
{
	foreach ($_loop1_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop1_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
			 			<option value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'projectUrl',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), false);
echo $this->scope["bannername"];?>" <?php if ((isset($this->scope["bannername"]) ? $this->scope["bannername"] : null) == $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'bannerGet',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), true)) {
?>selected="selected"<?php 
}?>>Version <?php echo $this->scope["version_number"];?></option>
						<?php 
/* -- loop end output */
		$this->setScope($_loop1_scope, true);
	}
}
?>

					</select>
				</li>
				<?php 
}?>

				<?php if ((isset($this->scope["bannerLangs"]) ? $this->scope["bannerLangs"] : null)) {
?>
				<li><em>switch banner to</em> <?php 
$_loop2_data = (isset($this->scope["bannerLangs"]) ? $this->scope["bannerLangs"] : null);
if ($this->isArray($_loop2_data) === true)
{
	foreach ($_loop2_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop2_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?><a href="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '.',  ),  2 =>   array (    0 => 'projectUrl',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->readParentVar(1), false);
echo $this->scope["bannername"];?>"><?php echo $this->scope["bannername"];?></a><?php 
/* -- loop end output */
		$this->setScope($_loop2_scope, true);
	}
}
?></li>
				<?php 
}?>

				<li>
					<div class="banner-url">
						<input type="text" onclick="this.select()" id="banner_url" value="<?php echo $this->scope["bannerLink"];?>" name="banner_url"/>
					</div>
				</li>
			</ul>
			<!-- CURRENT BANNER -->
			<?php 
}?>

		</div>
		
		<div class="clear">&nbsp;</div>

		<div id="banner">
			
			<?php if ((isset($this->scope["bannerIsSelected"]) ? $this->scope["bannerIsSelected"] : null)) {
?>
			<div id="tools">
				<a href="#closetools" class="close">X</a>
				<div class="content">
					<h3>Tools</h3>
					<ul>
						<li><a href="#showoutlines">show banner outline</a></li>
					</ul>
				</div>	
			</div>
			<?php 
}?>

			
			<div class="content">
				<?php if ((isset($this->scope["bannerIsSelected"]) ? $this->scope["bannerIsSelected"] : null)) {
?>
				
				<!-- CURRENT BANNER -->
				<script type="text/javascript">
					//<![CDATA[
						var flashvars = { 	clickTag: "javascript:clicktagTest('clickTag')", 
											clickTAG: "javascript:clicktagTest('clickTAG')", 
											url: "javascript:clicktagTest('url')" };
											
						var params = { allowFullScreen: true, wmode: "transparent", allowScriptAccess: "always" };
						var attributes = { id: "flash" };
				
						swfobject.embedSWF("<?php echo $this->scope["bannerPath"];?>", "flash_alternative", "<?php echo $this->scope["bannerWidth"];?>", "<?php echo $this->scope["bannerHeight"];?>", "8.0.0", "/html/assets/swf/expressInstall.swf", flashvars, params, attributes);
					//]]>
				</script>
		
				<style type="text/css">
					#flash {
						width: <?php echo $this->scope["bannerWidth"];?>px; 
						height: <?php echo $this->scope["bannerHeight"];?>px;
					}
				</style>
		
				<div id="flash_alternative">
					<h4>This preview requires the latest version of the Adobe Flash player</h4>
					<p>Voor deze preview heb je de flash plugin van Adobe nodig. Deze kan je <a href="http://www.adobe.com/go/getflashplayer">hier gratis en snel downloaden</a>.</p>
					<p>Als je zeker bent dat je de flash plugin geinstalleerd hebt kan je kan ook binnengaan zonder <a href="?detectflash=false">flash plugin detectie</a>.</p>
				</div>
				<!-- CURRENT BANNER -->
			
				<?php 
}
else {
?>
			
					Select a banner format.
			
				<?php 
}?>

			</div>
		</div>
		
		<div id="footer">
			<div class="content">Are you experiencing problems? <a href="mailto:pieter.michels@proximity.bbdo.be">Contact us</a> and we will help you further.</div>
		</div>
		
	</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>