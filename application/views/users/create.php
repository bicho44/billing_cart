<div id="content" class="login-page">
	<div class="container showgrd">
		<h1><span><?php echo Kohana::lang('login.title'); ?></span></h1>
		<form action="<?php echo url::site('login/create'); ?>" method="post" accept-charset="utf-8" class="smart-form">
			<p>
				<label for="email"><?php echo Kohana::lang('login.email.title'); ?></label>
				<input type="text" name="email" value="<?php if($repopulate['email']) echo $repopulate['email']; ?>";" id="email" class="size" />
				<?php if(isset($error['email'])) echo $error['email']; ?>
			</p>
			<p>
				<label for="username"><?php echo Kohana::lang('login.username.title'); ?></label>
				<input type="text" name="username" value="<?php if($repopulate['username']) echo $repopulate['username']; ?>";" id="username" class="size" />
				<?php if(isset($error['username'])) echo $error['username']; ?>
			</p>
			<p>
				<label for="password"><?php echo Kohana::lang('login.password.title'); ?></label>
				<input type="password" name="password" value="" id="password" class="size" />
				<?php if(isset($error['password'])) echo $error['password']; ?>
			</p>
			<p>
				<label for="password_confirm"><?php echo Kohana::lang('login.password_confirm.title'); ?></label>
				<input type="password" name="password_confirm" value="" id="password_confirm" class="size" />
				<?php if(isset($error['password_confirm'])) echo $error['password_confirm']; ?>
			</p>
			<div class="actions">
				<input type="submit" value="<?php echo Kohana::lang('login.register'); ?>">
			</div>
		</form>
	</div>
</div>