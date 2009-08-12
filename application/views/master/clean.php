<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo isset($page_title) ? $page_title . ' | ' : ''; ?><?php echo $app_name; ?></title>
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/screen.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/print.css" type="text/css" media="print" />
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/ie.css" type="text/css" media="screen, projection">
		<![endif]-->
		<link rel="stylesheet" href="<?php echo url::base(); ?>/assets/css/style.css" type="text/css" media="screen, projection" />
	</head>
	
	<body>
		<div id="header">
			<div id="logo" class="container">
				<img src="images/syzygy_logo.jpg" width="70" height="121" alt="<?php echo $app_name; ?>" />
			</div>
		</div>
		
		<div id="nav" class="container">
			<ul>
				<li><a href="<?php echo url::site('dashboard'); ?>">Dashboard</a></li>
				<li>
					<a href="<?php echo url::site('client'); ?>">Clients</a>
					<ul>
						<li><a href="<?php echo url::site('client/add'); ?>">Add Client</a></li>
					</ul>
				</li>
				<li>
					<a href="<?php echo url::site('invoice'); ?>">Invoices</a>
					<ul>
						<li><a href="<?php echo url::site('invoice/add'); ?>">Add Invoice</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- Content -->
		<?php echo $content; ?>
		<!-- Content -->
		
		<div id="footer">
			<div class="container showgrid">
				<div id="sister-sites" class="module">
					
				</div>
				
				<div id="contact" class="module">
					
				</div>
			</div>
		</div>
	</body>
</html>