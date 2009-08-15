<div id="content" class="login-page">
	<div class="container_16">
		
		<ul id="nav" class="grid_4 push_1">
			<li id="nav-1"><em></em><span><?php echo __('System Check'); ?></span></li>
			<li id="nav-2" class="active"><em></em><span><?php echo __('Database Setup'); ?></span></li>
			<li id="nav-3"><em></em><span><?php echo __('Save Config'); ?></span></li>
			<li id="nav-4"><em></em><span><?php echo __('Complete'); ?></span></li>
		</ul>
		
		<div id="main-block" class="grid_10">
			<h1><span><?php echo __('Database Setup'); ?></span></h1>
			<p class="intro"><?php echo __('Checking to see if server have all the requirements to install app'); ?> <?php echo $passed; ?></p>
			
			<!-- Error Message -->
			<?php if (!empty($error)): ?>
            <div class="error"><p><?php echo $error ?>.</p></div>
        	<?php endif; ?>
			<!-- / - Error Message -->
			
			<?php echo $open; ?>
			<p>
				<label for="host"><?php echo __('Host Name'); ?>:</label>
				<?php echo $host; ?> 
				<span class="<?php echo $host->error_msg_class; ?>"><?php echo $host->error; ?></span>
			</p>
			<p>
				<label for="username"><?php echo __('Username'); ?>:</label>
				<?php echo $username; ?> 
				<span class="<?php echo $username->error_msg_class; ?>"><?php echo $username->error; ?></span>
			</p>
			<p>
				<label for="password"><?php echo __('Password'); ?>:</label>
				<?php echo $password; ?> 
				<span class="<?php echo $password->error_msg_class; ?>"><?php echo $password->error; ?></span>
			</p>
			<p>
				<label for="database"><?php echo __('Database'); ?>:</label>
				<?php echo $database; ?> 
				<span class="<?php echo $database->error_msg_class; ?>"><?php echo $database->error; ?></span>
			</p>
			<p>
				<label for="prefix"><?php echo __('Table Prefix'); ?>:</label>
				<?php echo $prefix; ?> 
				<span class="<?php echo $prefix->error_msg_class; ?>"><?php echo $prefix->error; ?></span>
			</p>
			
			<div class="notice show">
				<p><?php echo __('Test connection and try to create database'); ?></p>
				<div id="next">
            		<a href="<?php echo url::site('install/ajax_db_check'); ?>" class="button" id="test-create-db"><?php echo __('Test'); ?></a>
            	</div>
			</div>
			
			<div id="more-options"<?php if($passed == 'pass') echo ' class="show"'; ?>>
				<h2><?php echo __('Optional fields below'); ?></h2>
				
				<p class="checkbox">
					<label for="drop"><?php echo __('Drop Tables'); ?>:</label>
					<?php echo $drop; ?> 
					<span class="<?php echo $drop->error_msg_class; ?>"><?php echo $drop->error; ?></span>
				</p>
				<p class="checkbox">
					<label for="data"><?php echo __('Insert Data'); ?>:</label>
					<?php echo $data; ?> 
					<span class="<?php echo $data->error_msg_class; ?>"><?php echo $data->error; ?></span>
				</p>
			</div>
			
			<!-- Success Message -->
            <div class="success <?php if($passed == 'pass') { echo 'show'; } else { echo 'hide'; } ?>">
            	<p><span class="hide"><?php echo $success ?>.</span>&nbsp;</p>
            	<div id="next">
            		<?php echo $submit; ?>
            	</div>
        	</div>
			
			<?php echo $close; ?>
			
		</div>
	</div>
	</div>
</div>