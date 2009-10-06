<?php 
    /*$even_odd = '';
    foreach ($items as $item) {
    $even_odd = ( ' even' != $even_odd ) ? ' even' : ' odd';*/ ?>
	<tr id="line-" class="node<?php //echo $even_odd; ?>">
		<td><a class="remove">Remove</a><?php echo $qty; ?><?php //echo $item['qty']; ?><?php echo $type; ?></td>
		<td><?php echo $description; ?></td>
		<td><?php echo $unit_price; ?></td>
		<td class="total">0.00</td>
	</tr>
<?php //} ?>