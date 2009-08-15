<div id="content" class="login-page">
	<div class="container_16">
		
		<ul id="nav" class="grid_4 push_1">
			<li id="nav-1"><em></em><span><?php echo __('System Check'); ?></span></li>
			<li id="nav-2"><em></em><span><?php echo __('Database Setup'); ?></span></li>
			<li id="nav-3"><em></em><span><?php echo __('Save Config'); ?></span></li>
			<li id="nav-4" class="active"><em></em><span><?php echo __('Complete'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
		</ul>
		<div id="main-block" class="grid_10">
			<h1><span><?php echo __('Complete'); ?></span></h1>
			<p class="intro"><?php echo __('You successfully installed %bc!', array('%bc' => Kohana::config('bc.bc'))); ?></p>
			
			<p><?php echo __('Login with the details below and remember to change your password on your first login.'); ?></p>
			
			<!-- Success Message -->
            <div class="success">
            	<p><?php echo __('Your username is <strong>admin</strong> and password <strong>password</strong>.'); ?></p>
            	<div id="next">
            		<a href="<?php echo url::base(); ?>" class="button"><?php echo __('Go to Login'); ?></a>
            	</div>
        	</div>
			<!-- / - Success Message -->
		</div>
	</div>
</div>

