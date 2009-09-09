<div class="login-holder">
    <?php echo $open; ?>
        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div id="error_message">
                <span><?php echo $error ?></span>
            </div>
        <?php endif; ?>
        <!-- / - Error Message -->
        <p>
            <label for="username"><?php echo __('Username') ?></label>
            <?php echo $username; ?>
        </p>
        <?php if (!empty($username->error)): ?><div class="<?php echo $username->error_msg_class; ?>"><?php echo $username->error; ?></div><?php endif; ?>
        <p>
            <label for="password"><?php echo __('Password') ?></label>
            <?php echo $password; ?>
        </p>
        <?php if (!empty($password->error)): ?><div class="<?php echo $password->error_msg_class; ?>"><?php echo $password->error; ?></div><?php endif; ?>
        <div class="actions">
            <span id="checkbox">
                <label for="remember_me"><?php echo __('remember me') ?></label><?php echo $remember_me; ?>
            </span>
            <div id="next">
                <?php echo $submit; ?>
            </div>
        </div>
    <?php echo $close; ?>
</div>