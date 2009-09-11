<div id="content" class="login-page">
	<div class="container showgrd">
		<?php //echo $form; ?>
		<?php echo $open; ?>
        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div id="error_message">
                <span><?php echo $error ?></span>
            </div>
        <?php endif; ?>
        <!-- / - Error Message -->
        <p>
            <label for="client"><?php echo __('Client') ?></label>
            <?php echo $client; ?>
        </p>
        <?php if (!empty($client->error)): ?><div class="<?php echo $client->error_msg_class; ?>"><?php echo $client->error; ?></div><?php endif; ?>
        
        <p>
            <label for="invoice_no"><?php echo __('Invoice No') ?></label>
            <?php echo $invoice_no; ?>
        </p>
        <?php if (!empty($invoice_no->error)): ?><div class="<?php echo $invoice_no->error_msg_class; ?>"><?php echo $invoice_no->error; ?></div><?php endif; ?>
        
        <p>
            <label for="invoice_no"><?php echo __('Invoice No') ?></label>
            <?php echo $invoice_no; ?>
        </p>
        <?php if (!empty($invoice_no->error)): ?><div class="<?php echo $invoice_no->error_msg_class; ?>"><?php echo $invoice_no->error; ?></div><?php endif; ?>
        
        <div class="actions">
            <div id="next">
                <?php echo $submit; ?>
            </div>
        </div>
    <?php echo $close; ?>
	</div>
</div>