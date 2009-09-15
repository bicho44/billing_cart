<div class="container_16">
    <table border="0" class="table-nice" width="100%" cellpadding="0" cellspacing="0">
		<thead id="site-map-def">
			<tr>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Contacts'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php 
            $alt = '';
            foreach ($clients as $client) {
            $alt = ( ' alt' != $alt ) ? ' alt' : ''; ?>
			<tr class="node<?php echo $alt; ?>">
				<td><?php echo $client['company']; ?></td>
				<td>
					<a href="<?php echo url::site('contacts/new/' . $client['id']); ?>">Add Contact</a>
					<div>
					<?php 
						$contacts = $client['contact'];
						if (count($contacts)): ?>
						<?php foreach ($contacts as $contact): ?>
							<div>
								<?php echo $contact['first'] . ' ' . $contact['last']; ?> - 
								<a href="<?php echo url::site('contacts/edit/' . $contact['id']); ?>">Edit</a> | <a href="<?php echo url::site('contacts/change_client/' . $contact['id']); ?>">Change Client</a>
							</div>
						<?php endforeach ?>
					<?php endif ?>
					</div>
				</td>
				<td><a href="<?php echo url::site('clients/edit/' . $client['id']); ?>">Edit</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
