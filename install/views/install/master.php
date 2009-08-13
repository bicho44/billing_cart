<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $page_title . ' | '; ?> <?php echo $app_name; ?></title>
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/reset.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/text.css" type="text/css" media="print" />
		<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/960.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="<?php echo url::base(); ?>install/views/assets/css/style.css" type="text/css" media="screen, projection" />
		<script type="text/javascript" charset="utf-8">
			document.writeln('\n\t<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/js_style.css" type="text/css" media="screen, projection" />');
		</script>
	</head>
	
	<body>
		<div id="header">
			<div id="logo" class="container">
				<img src="images/syzygy_logo.jpg" width="70" height="121" alt="<?php echo $app_name; ?>" />
			</div>
		</div>
                        
		<!-- Content -->
		<?php echo $content; ?>
		<!-- / - Content -->
		
		<div id="footer">
			<!-- <div class="container showgrid">
				<div id="sister-sites" class="module">
					<h3>More Developments</h3>
					<ul>
						<li><a href="" target="_blank">Silent Works</a></li>
						<li><a href="" target="_blank">Syzygy Germany</a></li>
						<li><a href="" target="_blank">Digital Schweinshaxe</a></li>
					</ul>
					<span class="twitter">
						<a href="http://twitter.com/billingcart" target="_blank"><span>Billing Cart Twitter</span></a>
					</span>
				</div>
				
				<div id="contact" class="module">
					<h3>Contact</h3>
					<ul>
						<li>Syzygy London</li>
						<li>The Johnson Building</li>
						<li>77 Hatton Garden</li>
						<li>London EC1N 8JS</li>
						<li class="tel">Tel: +44 (020) 320 06 4000</li>
						<li class="email">email: <a href="mailto:london@syzygy.net">london@syzygy.net</a></li>
					</ul>
				</div>
			</div> -->
		</div>
		
		<script src="<?php echo url::base(); ?>assets/js/lib/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="<?php echo url::base(); ?>assets/js/lib/jquery.timer.js" type="text/javascript"></script>
		<script src="<?php echo url::base(); ?>install/views/assets/js/base.js" type="text/javascript"></script>
	</body>
</html>