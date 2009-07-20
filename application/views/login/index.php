<div id="content" class="login-page">
	<div class="container showgrd">
		<h1><span><?php echo Kohana::lang('login.title'); ?></span></h1>
		<form action="<?php echo url::site('login'); ?>" method="post" accept-charset="utf-8" class="smart-form">
			<p>
				<label for="username"><?php echo Kohana::lang('login.username'); ?></label>
				<input type="text" name="username" value="" id="username" class="size" />
			</p>
			<p>
				<label for="password"><?php echo Kohana::lang('login.password'); ?></label>
				<input type="password" name="password" value="" id="password" class="size" />
			</p>
			<div class="actions">
				<input type="submit" value="<?php echo Kohana::lang('login.submit'); ?>">
				<span id="checkbox">
					<input type="checkbox" name="chkbox" tabindex="4" size="1" value="" id="chkbox"/><label for="chkbox"><?php echo Kohana::lang('login.remember_me'); ?></label>
				</span>
			</div>
		</form>
	</div>
</div>