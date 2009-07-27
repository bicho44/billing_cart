<div class="container">
	<h1>Welcome <?php //echo $username; ?></h1>
	<h3><a href="<?php echo url::site('login/logout'); ?>">Logout</a></h3>
	<ul>
	<?php 
	if(count($invoices) > 0):
	foreach ($invoices as $invoice) { ?>
		<li>
			<?php echo $invoice['company']; ?> - <a href="<?php echo url::site('client/edit/' . $invoice['id']); ?>">Edit</a>
			<ul>
				<?php 
					$contacts = $invoice['item'];
					if (count($contacts)): ?>
					<?php foreach ($contacts as $contact): ?>
						<li>
							<?php echo $contact['first'] . ' ' . $contact['last']; ?> - 
							<a href="<?php echo url::site('contact/edit/' . $contact['id']); ?>">Edit</a> | <a href="<?php echo url::site('contact/change_client/' . $contact['id']); ?>">Change Client</a>
						</li>
					<?php endforeach ?>
				<?php endif ?>
			</ul>
		</li>
	<?php } 
	endif
	?>
	</ul>
</div>