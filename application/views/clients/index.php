<div class="container">
	<h1>Welcome <?php //echo $username; ?></h1>
	<h3><a href="<?php echo url::site('login/logout'); ?>">Logout</a></h3>
	<ul>
	<?php foreach ($clients as $client) { ?>
		<li>
			<?php echo $client['company']; ?><a href="<?php echo url::site('client/edit/' . $client['id']); ?>">Edit</a>
			<ul>
				<a href="<?php echo url::site('contact/add/' . $client['id']); ?>">Add Contact</a>
				<?php 
					$contacts = $client['contact'];
					if (count($contacts)): ?>
					<?php foreach ($contacts as $contact): ?>
						<li><?php echo $contact['first']; ?></li>
					<?php endforeach ?>
				<?php endif ?>
			</ul>
		</li>
	<?php } ?>
	</ul>
</div>