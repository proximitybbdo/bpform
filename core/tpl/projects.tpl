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
		
		<div class="clear">&nbsp;</div>

		<div id="projects">
			<div class="content">
				<h2>Client Name</h2>
				<p>This is an overview of all the projects that exists for this client.</p>
				<ul class="projects-list">
					<li><label>Project Name</label> <em>Last Modification Date</em></li>
					{foreach from=$projectList item=project}
					<li><a href="{$project.folder_name}">{$project.folder_name}</a> <em>{$project.mod_date}</em></li>
					{/foreach}
				<ul>
			</div>
		</div>
		
		<div id="footer">
			<div class="content">Are you experiencing problems? <a href="mailto:pieter.michels@proximity.bbdo.be">Contact us</a> and we will help you further.</div>
		</div>
		
	</body>
</html>
