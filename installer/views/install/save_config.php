<div id="content" class="login-page">
	<div class="container_16">
		
		<ul id="nav" class="grid_4 push_1">
			<li id="nav-1"><em></em><span><?php echo __('System Check'); ?></span></li>
			<li id="nav-2"><em></em><span><?php echo __('Database Setup'); ?></span></li>
			<li id="nav-3" class="active"><em></em><span><?php echo __('Save Config'); ?></span></li>
			<li id="nav-4"><em></em><span><?php echo __('Complete'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
		</ul>
		<div id="main-block" class="grid_10">
			<h1><span><?php echo __('Saving Database Configuration File'); ?></span></h1>
			<p class="intro"><?php echo __('We are trying to save the database config file'); ?></p>
			
			<!-- Error Message -->
			<?php if ( ! empty($error)): ?><div class="error"><p><?php echo $error ?>.</p></div><?php endif; ?>
			<!-- / - Error Message -->
			
			<p><?php echo __('Create a file called database.php inside the application/config directory and set its permission to 775'); ?>.</p>
			
			<!-- Success Message -->
            <div class="success">
            	<p><?php echo __('Come on don\'t give up try again'); ?>.</p>
            	<div id="next">
            		<a href="<?php echo url::site('install/save_config'); ?>" class="button"><?php echo __('Try Again'); ?></a>
            	</div>
        	</div>
			<!-- / - Success Message -->
		</div>
	</div>
</div>

