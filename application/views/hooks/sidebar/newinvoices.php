<div class="inner">
	<ul id="quickmenu">
		<li><a id="quickmenu-btn" href="<?php echo url::site('invoices/new'); ?>"><span><?php echo __('New Invoice') ?></span></a></li>
	</ul>
	
	<?php echo form::open('invoices/new', array('id'=>'hook-new-invoice', 'class'=>'smart-form heide')) ?>
        <p>
            <label for="client"><?php echo __('Client') ?></label>
            <?php
            $selections = array(''=>'Select an existing client', '-'=>'---');
            $selections += $clients;
            echo form::dropdown('client', $selections, '','class="size"'); ?>
        </p>
        <p>
            <label for="client_new"><?php echo __('New Client') ?></label>
            <?php echo form::input('client_new', __('or enter a new client'), 'class="size"'); ?>
        </p>
        <div class="actions">
            <div class="cancel">
                <a href="#cancel" class="button" id="hook-new-invoice-cancel"><?php echo __('cancel'); ?></a>
            </div>
            <div id="next">
                <?php echo form::submit('submit', __('create invoice'), 'class="button"'); ?>
            </div>
        </div>
    <?php echo form::close(); ?>
</div>