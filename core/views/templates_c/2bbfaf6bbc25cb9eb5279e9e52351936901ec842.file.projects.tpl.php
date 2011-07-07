<?php /* Smarty version Smarty-3.0.8, created on 2011-07-07 16:02:40
         compiled from "/Volumes/data/Users/pieterm/Documents/Projects/BPForm/core/src/clientproject/../../tpl/projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11609976434e15bc80be9112-95895969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bbfaf6bbc25cb9eb5279e9e52351936901ec842' => 
    array (
      0 => '/Volumes/data/Users/pieterm/Documents/Projects/BPForm/core/src/clientproject/../../tpl/projects.tpl',
      1 => 1310047277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11609976434e15bc80be9112-95895969',
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
		
		<div class="clear">&nbsp;</div>

		<div id="projects">
			<div class="content">
				<h2>Client Name</h2>
				<p>This is an overview of all the projects that exists for this client.</p>
				<ul class="projects-list">
					<li><label>Project Name</label> <em>Last Modification Date</em></li>
					<?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projectList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value){
?>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['project']->value['folder_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['project']->value['folder_name'];?>
</a> <em><?php echo $_smarty_tpl->tpl_vars['project']->value['mod_date'];?>
</em></li>
					<?php }} ?>
				<ul>
			</div>
		</div>
		
		<div id="footer">
			<div class="content">Are you experiencing problems? <a href="mailto:pieter.michels@proximity.bbdo.be">Contact us</a> and we will help you further.</div>
		</div>
		
	</body>
</html>
