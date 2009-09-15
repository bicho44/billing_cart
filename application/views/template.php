<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><?php echo isset($page_title) ? $page_title . ' | ' : ''; ?><?php echo $app_name; ?></title>
        <link rel="stylesheet" href="<?php echo url::base(); ?>/assets/css/style.css" type="text/css" media="screen, projection" />
    </head>

    <body>
        <div id="header">
        	<div id="extra_nav">
				<ul>
					<li><a href=""><span>Help</span></a></li>
					<li class="last"><a href="<?php echo url::site('login/logout'); ?>"><span>Logout</span></a></li>
				</ul>
			</div>
        	
            <div id="logo">
                <a href="http://www.billingcart.com" title="invoicing with Billing Cart" target="_blank">
                    <span class="app-name"><?php echo $app_name; ?></span>
                </a>
            </div>
        </div>
        <!-- TODO: create navigation dynamically -->
        <div id="nav">
            <ul>
                <?php foreach (theme::nav('active') as $nav): ?>
                    <li id="<?php echo $nav['cssid']; ?>" class="<?php echo $nav['cssmode']; ?> <?php echo $nav['align']; ?>">
                        <a href="<?php echo $nav['url']; ?>" title="Go to the <?php echo $nav['title']; ?> page"><?php echo $nav['title']; ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <!-- Content -->
        <div id="content">
            
            
			<div id="main">
				<div class="inner">
					<h1 id="page_title"><?php echo $page_title; ?></h1>
					
					<div id="wrapper">
						<?php echo $content; ?>
					</div>
					
				</div>
			</div>
			
			<div id="sidebar">
				<?php echo theme::hook($sidebar) ?>
			</div>
            
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