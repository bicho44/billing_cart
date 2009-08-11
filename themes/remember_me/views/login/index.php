<div id="content" class="login-page">
	<div class="container showgrd">
		<h1><span><?php echo __('Login'); ?></span></h1>
		<form action="<?php echo url::site('login'); ?>" method="post" accept-charset="utf-8" class="smart-form">
			<p>
				<label for="username"><?php echo Kohana::lang('login.username.title'); ?></label>
				<input type="text" name="username" tabindex="1" value="<?php if($repopulate['username']) echo $repopulate['username']; ?>";" id="username" class="size" />
				<?php if(isset($error['username'])) echo $error['username']; ?>
			</p>
			<p>
				<label for="password"><?php echo Kohana::lang('login.password.title'); ?></label>
				<input type="password" name="password" tabindex="2" value="" id="password" class="size" />
				<?php if(isset($error['password'])) echo $error['password']; ?>
			</p>
			<div class="actions">
				<input type="submit" value="<?php echo Kohana::lang('login.submit'); ?>">
				<span id="checkbox">
					<input type="checkbox" name="remember_me" tabindex="3" size="1" value="" id="remember_me"/><label for="remember_me"><?php echo Kohana::lang('login.remember_me'); ?></label>
				</span>
			</div>
		</form>
	</div>
</div>