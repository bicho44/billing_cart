<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $page_title . ' | '; ?> <?php echo $app_name; ?></title>
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/reset.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/text.css" type="text/css" media="print" />
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/960.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="<?php echo url::base(); ?>installer/views/assets/css/style.css" type="text/css" media="screen, projection" />
		<script type="text/javascript" charset="utf-8">
			document.writeln('\n\t<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/js_style.css" type="text/css" media="screen, projection" />');
		</script>
	</head>
	
	<body>
		<div id="header">
			<h1 id="logo" class="container_16">
				<a href="http://www.billingcart.com" title="invoicing with Billing Cart" target="_blank">
					<span class="app-name"><?php echo $app_name; ?></span>
				</a>
			</h1>
		</div>
                        
		<!-- Content -->
		<?php echo $content; ?>
		<!-- / - Content -->
		
		<div id="footer" class="container_16">
			<p class="grid_14">
				<?php echo __('Thank you for invoicing with %bc.', array('%bc'=>$app_name)); ?>
				 | <a href="http://www.billingcart.com/documentation/" target="_blank"><?php echo __('Documentation'); ?></a>
				 | <a href="http://www.billingcart.com/feedback/" target="_blank"><?php echo __('Feedback'); ?></a>
				<span class="version"><?php echo __('Version') .' '. $version; ?></span>
			</p>
		</div>
		
		<script src="<?php echo url::base(); ?>assets/js/lib/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="<?php echo url::base(); ?>assets/js/lib/jquery.timer.js" type="text/javascript"></script>
		<script src="<?php echo url::base(); ?>installer/views/assets/js/base.js" type="text/javascript"></script>
	</body>
</html>