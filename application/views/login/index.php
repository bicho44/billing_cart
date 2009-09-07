<div class="login-holder">
    <?php echo $open; ?>
        <p>
            <label for="username"><?php echo __('Username') ?></label>
            <?php echo $username; ?>
            <span class="<?php echo $username->error_msg_class; ?>"><?php echo $username->error; ?></span>
        </p>
        <p>
            <label for="password"><?php echo __('Password') ?></label>
            <?php echo $password; ?>
            <span class="<?php echo $password->error_msg_class; ?>"><?php echo $password->error; ?></span>
        </p>
        <div class="actions">
            <span id="checkbox">
                <label for="remember_me"><?php echo __('remember me') ?></label><input type="checkbox" name="remember_me" tabindex="3" size="1" value="" id="remember_me"/>
            </span>
            <div id="next">
                <?php echo $submit; ?>
            </div>
        </div>
    <?php echo $close; ?>
</div>