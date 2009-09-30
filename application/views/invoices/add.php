<div id="add-invoice">
	<div class="portlet">
		<h2><?php echo __('Invoice for %client_name', array('%client_name'=>$client_name)) ?></h2>
		<?php //echo $form; ?>
		<?php echo $open; ?>
	        <!-- Error Message -->
	        <?php if (!empty($error)): ?>
	            <div id="error_message">
	                <span><?php echo $error ?></span>
	            </div>
	        <?php endif; ?>
	        <!-- / - Error Message -->
	        <div class="invoice-info">
	        	<p>
		            <label for="client"><?php echo __('Client') ?></label>
		            <?php echo $client; ?>
		        </p>
		        <?php if (!empty($client->error)): ?><div class="<?php echo $client->error_msg_class; ?>"><?php echo $client->error; ?></div><?php endif; ?>
		        
		        <p>
		            <label for="invoice_id"><?php echo __('Invoice ID') ?></label>
		            <?php echo $invoice_id; ?>
		        </p>
		        <?php if (!empty($invoice_id->error)): ?><div class="<?php echo $invoice_id->error_msg_class; ?>"><?php echo $invoice_id->error; ?></div><?php endif; ?>
		        
		        <p>
		            <label for="po_number"><?php echo __('P.O. Number') ?></label>
		            <?php echo $po_number; ?>
		        </p>
		        <?php if (!empty($po_number->error)): ?><div class="<?php echo $po_number->error_msg_class; ?>"><?php echo $po_number->error; ?></div><?php endif; ?>
	        </div>
	        
	        <div class="invoice-details">
	        	<table border="0" class="table-nice" width="100%" cellpadding="0" cellspacing="0">
					<thead id="site-map-def">
						<tr>
							<th><?php echo __('Qty'); ?></th>
							<th><?php echo __('Description'); ?></th>
							<th><?php echo __('Price'); ?></th>
							<th><?php echo __('Total'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $item_view; ?>
					</tbody>
				</table>
	        </div>
	        	        
	        <div class="actions">
	            <div id="next">
	                <?php echo $submit; ?>
	            </div>
	        </div>
	    <?php echo $close; ?>
	</div>
</div>