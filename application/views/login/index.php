<div id="content" class="container_16">
	<div class="grid_8 push_4">
		<h1><span><?php echo Kohana::lang('login.title'); ?></span></h1>
		<?php echo $open; ?>
			<p>
				<label for="username"><?php echo __('Username') ?></label>
				<?php echo $username; ?>
				
			</p>
			<p>
				<label for="password"><?php echo __('Password') ?></label>
				<?php echo $password; ?>
				
			</p>
			<div class="actions">
				<input type="submit" value="<?php echo __('Login'); ?>">
				<span id="checkbox">
					<input type="checkbox" name="remember_me" tabindex="3" size="1" value="" id="remember_me"/><label for="remember_me"><?php echo __('remember me') ?></label>
				</span>
			</div>
		<?php echo $close; ?>
	</div>
</div>