<div class="container">
	<h1>Welcome <?php //echo $username; ?></h1>
	<h3><a href="<?php echo url::site('login/logout'); ?>">Logout</a></h3>
	<ul>
	<?php //var_dump($clients['contact']); die; ?>
	<?php foreach ($clients['client'] as $client) { ?>
		<li>
			<?php echo $client->company; ?>
		</li>
	<?php } ?>
	</ul>
	<ul>
		<?php foreach ($clients['contact'] as $contact): ?>
			<li><?php echo $contact->first; ?></li>
		<?php endforeach ?>
	</ul>
</div>