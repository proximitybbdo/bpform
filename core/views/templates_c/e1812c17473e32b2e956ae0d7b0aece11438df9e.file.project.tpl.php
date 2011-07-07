<?php /* Smarty version Smarty-3.0.8, created on 2011-07-07 16:03:30
         compiled from "/Volumes/data/Users/pieterm/Documents/Projects/BPForm/core/src/projectbanners/../../tpl/project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7798331214e15bcb297cf47-32005178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1812c17473e32b2e956ae0d7b0aece11438df9e' => 
    array (
      0 => '/Volumes/data/Users/pieterm/Documents/Projects/BPForm/core/src/projectbanners/../../tpl/project.tpl',
      1 => 1310047286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7798331214e15bcb297cf47-32005178',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	
	<link href="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/assets/css/config.css" rel="stylesheet" type="text/css" media="screen, projection" />
	<link href="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/framework/css/print.css" rel="stylesheet" type="text/css" media="print" />
	
	<!--[if IE]><link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/assets/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/assets/css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	
	<script src="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/framework/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/framework/js/swfobject.js" type="text/javascript"></script>
	
	<script src="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/assets/js/jquery.dotimeout.js" type="text/javascript"></script>
	
	<script src="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/assets/js/base.js" type="text/javascript"></script>
	
	<!--[if lt IE 7]>
		<script src="<?php echo $_smarty_tpl->getVariable('base_path')->value;?>
html/framework/js/DD_belatedPNG.0.0.8a-min.js" type="text/javascript"></script>
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
				<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannersList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value){
?>
	 			<option value="<?php echo $_smarty_tpl->getVariable('projectUrl')->value;?>
<?php echo $_smarty_tpl->tpl_vars['banner']->value['bannername'];?>
" <?php if ($_smarty_tpl->tpl_vars['banner']->value['bannername']==$_smarty_tpl->getVariable('bannerGet')->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['banner']->value['bannername'];?>
</option>
				<?php }} ?>
			</select>
		
			<?php if ($_smarty_tpl->getVariable('bannerIsSelected')->value){?>
			<!-- CURRENT BANNER -->
			<ul id="topmenu">
				<?php if ($_smarty_tpl->getVariable('bannerHasVersions')->value){?>
				<li>	
					<p class="bannerversionslist">Has multiple versions:</p>
					<select id="bannerversionslist">
						<option>Select banner version</option>
						<option value="<?php echo $_smarty_tpl->getVariable('projectUrl')->value;?>
<?php echo $_smarty_tpl->getVariable('bannerParentName')->value;?>
" <?php if ($_smarty_tpl->getVariable('bannerParentName')->value==$_smarty_tpl->getVariable('bannerGet')->value){?>selected="selected"<?php }?>>Latest version</option>
						<?php  $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannersVersions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['version']->key => $_smarty_tpl->tpl_vars['version']->value){
?>
			 			<option value="<?php echo $_smarty_tpl->getVariable('projectUrl')->value;?>
<?php echo $_smarty_tpl->tpl_vars['version']->value['bannername'];?>
" <?php if ($_smarty_tpl->tpl_vars['version']->value['bannername']==$_smarty_tpl->getVariable('bannerGet')->value){?>selected="selected"<?php }?>>Version <?php echo $_smarty_tpl->tpl_vars['version']->value['version_number'];?>
</option>
						<?php }} ?>
					</select>
				</li>
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('bannerLangs')->value){?>
				<li><em>switch banner to</em> <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bannerLangs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
?><a href="<?php echo $_smarty_tpl->getVariable('projectUrl')->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang']->value['bannername'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['bannername'];?>
</a><?php }} ?></li>
				<?php }?>
				<li>
					<div class="banner-url">
						<input type="text" onclick="this.select()" id="banner_url" value="<?php echo $_smarty_tpl->getVariable('bannerLink')->value;?>
" name="banner_url"/>
					</div>
				</li>
			</ul>
			<!-- CURRENT BANNER -->
			<?php }?>
		</div>
		
		<div class="clear">&nbsp;</div>

		<div id="banner">
			
			<?php if ($_smarty_tpl->getVariable('bannerIsSelected')->value){?>
			<div id="tools">
				<a href="#closetools" class="close">X</a>
				<div class="content">
					<h3>Tools</h3>
					<ul>
						<li><a href="#showoutlines">show banner outline</a></li>
					</ul>
				</div>	
			</div>
			<?php }?>
			
			<div class="content">
				<?php if ($_smarty_tpl->getVariable('bannerIsSelected')->value){?>
				
				<!-- CURRENT BANNER -->
				<script type="text/javascript">
					//<![CDATA[
						var flashvars = { 	clickTag: "javascript:clicktagTest('clickTag')", 
											clickTAG: "javascript:clicktagTest('clickTAG')", 
											url: "javascript:clicktagTest('url')" };
											
						var params = { allowFullScreen: true, wmode: "transparent", allowScriptAccess: "always" };
						var attributes = { id: "flash" };
				
						swfobject.embedSWF("<?php echo $_smarty_tpl->getVariable('bannerPath')->value;?>
", "flash_alternative", "<?php echo $_smarty_tpl->getVariable('bannerWidth')->value;?>
", "<?php echo $_smarty_tpl->getVariable('bannerHeight')->value;?>
", "8.0.0", "/html/assets/swf/expressInstall.swf", flashvars, params, attributes);
					//]]>
				</script>
		
				<style type="text/css">
					#flash {
						width: <?php echo $_smarty_tpl->getVariable('bannerWidth')->value;?>
px; 
						height: <?php echo $_smarty_tpl->getVariable('bannerHeight')->value;?>
px;
					}
				</style>
		
				<div id="flash_alternative">
					<h4>This preview requires the latest version of the Adobe Flash player</h4>
					<p>Voor deze preview heb je de flash plugin van Adobe nodig. Deze kan je <a href="http://www.adobe.com/go/getflashplayer">hier gratis en snel downloaden</a>.</p>
					<p>Als je zeker bent dat je de flash plugin geinstalleerd hebt kan je kan ook binnengaan zonder <a href="?detectflash=false">flash plugin detectie</a>.</p>
				</div>
				<!-- CURRENT BANNER -->
			
				<?php }else{ ?>
			
					Select a banner format.
			
				<?php }?>
			</div>
		</div>
		
		<div id="footer">
			<div class="content">Are you experiencing problems? <a href="mailto:pieter.michels@proximity.bbdo.be">Contact us</a> and we will help you further.</div>
		</div>
		
	</body>
</html>
