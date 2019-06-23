<div class='box'>
	<div class='box-body'>
<table class='table table-striped'>
	<thead>
		<tr>
			<th class='description'><?php echo __('Description') ?></th>
			<th class='type'><?php echo __('Type') ?></th>
            <td>&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pager->getResults() as $microtask_preset): ?>
			<tr>
				<td><?php echo $microtask_preset->getDescription() ?></td>
				<td><?php echo $microtask_preset->getType() ?></td>
				<td>
					<a href="<?php echo url_for('preset_delete', $microtask_preset) ?>" class='btn btn-sm btn-danger' title="<?php echo __('Удалить') ?>" onclick="return window.confirm('Уверены?')"><i class='fa fa-trash-o'></i></a>            
					<a href="<?php echo url_for('preset_edit', $microtask_preset) ?>" class='btn btn-sm btn-default' title="<?php echo __('Править') ?>" ><i class='fa fa-pencil'></i></a>            					
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
	</div>
</div>