<div class="container">
	<h1>Welcome <?php //echo $username; ?></h1>
	<h3><a href="<?php echo url::site('login/logout'); ?>">Logout</a></h3>
	<ul>
		<?php //var_dump($clients['client']); die; ?>
	<?php foreach ($clients['client'] as $client) { ?>
		<li>
			<?php echo $client->company; ?>
			<ul>
				<?php //foreach ($clients['contacts'] as $contact): ?>
					<li><?php //echo $contact->first; ?></li>
				<?php //endforeach ?>
			</ul>
		</li>
	<?php } ?>
	</ul>
</div>