<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo isset($page_title) ? $page_title . ' | ' : ''; ?><?php echo $app_name; ?></title>
        <link rel="stylesheet" href="<?php echo url::base(); ?>/assets/css/style.css" type="text/css" media="screen, projection" />
        <script type="text/javascript" charset="utf-8">
            document.writeln('\n\t<link rel="stylesheet" href="<?php echo url::base(); ?>assets/css/js_style.css" type="text/css" media="screen, projection" />');
        </script>
    </head>
	
    <body id="login">
        <div id="header">
            <div id="logo">
                <a href="http://www.billingcart.com" title="invoicing with Billing Cart" target="_blank">
                    <span class="app-name"><?php echo $app_name; ?></span>
                </a>
            </div>
        </div>

        <!-- Content -->
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- Content -->

        <div id="footer">

        </div>

        <script src="<?php echo url::base(); ?>/assets/js/lib/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script src="<?php echo url::base(); ?>/assets/js/base.js" type="text/javascript"></script>
    </body>
</html>