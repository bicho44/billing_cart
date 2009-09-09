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

    <body>
        <div id="header">
            <div id="logo">
                <a href="http://www.billingcart.com" title="invoicing with Billing Cart" target="_blank">
                    <span class="app-name"><?php echo $app_name; ?></span>
                </a>
            </div>
        </div>
        <!-- TODO: create navigation dynamically -->
        <div id="nav">
            <ul>
                <li class="active"><a href="<?php echo url::site('dashboard'); ?>"><?php echo __('Dashboard'); ?></a></li>
                <li>
                    <a href="<?php echo url::site('client'); ?>"><?php echo __('Clients'); ?></a>
                    <!-- <ul>
                        <li><a href="<?php echo url::site('client/add'); ?>">Add Client</a></li>
                    </ul> -->
                </li>
                <li>
                    <a href="<?php echo url::site('invoice'); ?>"><?php echo __('Invoices'); ?></a>
                <!-- <ul>
                        <li><a href="<?php echo url::site('invoice/add'); ?>">Add Invoice</a></li>
                    </ul> -->
                </li>
                <li id="settings" class="right">
                    <a href="<?php echo url::site('setting'); ?>"><?php echo __('Settings'); ?></a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div id="content">
            <?php echo $content; ?>
        </div>
        <!-- Content -->

        <div id="footer">
            <div class="pad">
                <div id="sister-sites" class="module">

                </div>

                <div id="contact" class="module">

                </div>
            </div>
        </div>
    </body>
</html>