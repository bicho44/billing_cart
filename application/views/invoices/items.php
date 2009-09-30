<?php 
    /*$even_odd = '';
    foreach ($items as $item) {
    $even_odd = ( ' even' != $even_odd ) ? ' even' : ' odd';*/ ?>
	<tr class="node<?php //echo $even_odd; ?>">
		<td><a class="remove">Remove</a><?php echo form::input('qty', '1'); ?><?php //echo $item['qty']; ?><?php echo form::dropdown('type', $type, ''); ?></td>
		<td><?php echo form::textarea('description'); ?></td>
		<td>price</td>
		<td>total</td>
	</tr>
<?php //} ?>