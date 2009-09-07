<div class="container_16">
	<div class="grid_13">
		<h1>Welcome <?php echo $username; ?></h1>
		<h3><a href="<?php echo url::site('login/logout'); ?>">Logout</a></h3>
	</div>
	<div id="sidebar" class="grid_3">
		<a id="new-invoice" href="<?php echo url::site('invoice/add');; ?>"><span>New Invoice</span></a>
	</div>
</div>