<div class="container_16">
    <table border="0" class="table-nice" width="100%" cellpadding="0" cellspacing="0">
		<thead id="site-map-def">
			<tr>
				<th><?php echo __('Client'); ?></th>
				<th><?php echo __('ID'); ?></th>
				<th><?php echo __('Contact'); ?></th>
				<th><?php echo __('Total Amount'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$even_odd = '';
			foreach ($invoices as $invoice):
			$even_odd = ( ' even' != $even_odd ) ? ' even' : ' odd'; ?>
				<tr class="node<?php echo $even_odd; ?>">
					<td><?php echo $client[$invoice['client_id']]['company']; ?></td>
					<td><?php echo $invoice['invoice_no']; ?></td>
					<td><?php echo $client[$invoice['client_id']]['contact']; ?></td>
					<td><?php echo $invoice['total_amount']; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>