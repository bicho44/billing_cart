<?php 
    /*$even_odd = '';
    foreach ($items as $item) {
    $even_odd = ( ' even' != $even_odd ) ? ' even' : ' odd';*/ ?>
	<tr id="line-" class="node<?php //echo $even_odd; ?>">
		<td><a class="remove">Remove</a><?php echo form::input('qty', '1', 'class="qty"'); ?><?php //echo $item['qty']; ?><?php echo form::dropdown('type', $type, ''); ?></td>
		<td><?php echo form::textarea('description'); ?></td>
		<td><?php echo form::input('unit_price'); ?></td>
		<td class="total">0.00</td>
	</tr>
<?php //} ?>