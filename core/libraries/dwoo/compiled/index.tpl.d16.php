<?php
ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Template</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<script type="text/javascript" src="assets/js/swfobject.js"></script>
	</head>
	<body>
	
		<h1>Banner Platform Preview</h1>
	
		<ul>
			<?php 
$_loop0_data = (isset($this->scope["banners_list"]) ? $this->scope["banners_list"] : null);
if ($this->isArray($_loop0_data) === true)
{
	foreach ($_loop0_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop0_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?>
 			<li><a href="?b=<?php echo $this->scope["bannername"];?>"><?php echo $this->scope["bannername"];?></a></li>
			<?php 
/* -- loop end output */
		$this->setScope($_loop0_scope, true);
	}
}
?>

		</ul>
		
		<!-- CURRENT BANNER -->
		<ul>
			<li>Switch banner to <?php 
$_loop1_data = (isset($this->scope["banner_langs"]) ? $this->scope["banner_langs"] : null);
if ($this->isArray($_loop1_data) === true)
{
	foreach ($_loop1_data as $tmp_key => $this->scope["-loop-"])
	{
		$_loop1_scope = $this->setScope(array("-loop-"));
/* -- loop start output */
?><a href="?b=<?php echo $this->scope["bannername"];?>"><?php echo $this->scope["bannername"];?></a><?php 
/* -- loop end output */
		$this->setScope($_loop1_scope, true);
	}
}
?></li>
			<li>Copy link <input type="text" value="<?php echo $this->scope["bannerlink"];?>" /></li>
		</ul>

		<script type="text/javascript">
			//<![CDATA[
				var flashvars = { };
				var params = { allowFullScreen: true };
				var attributes = { id: "flash" };
				
				swfobject.embedSWF("<?php echo $this->scope["bannerpath"];?>", "flash_alternative", "<?php echo $this->scope["bannerwidth"];?>", "<?php echo $this->scope["bannerheight"];?>", "8.0.0", "assets/swf/expressInstall.swf", flashvars, params, attributes);
			//]]>
		</script>
		
		<style type="text/css">
			#flash {
				width: <?php echo $this->scope["bannerwidth"];?>px; 
				height: <?php echo $this->scope["bannerheight"];?>px;
			}
		</style>
		
		<div id="flash_alternative"></div>
		<!-- CURRENT BANNER -->
		
	</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>