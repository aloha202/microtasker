<div class='box'>
	<div class='box-body'>
<table class='table table-striped'>
	<thead>
		<tr>
			<th class='description'><?php echo __('Дата') ?></th>
			<th class='type'><?php echo __('Задача') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($Items as $Item): ?>
		<tr>
			<td><?php echo project_datetime($Item['completed_at']) ?></td>
			<td><?php echo $Item['description'] ?></td>
		</tr>		
		<?php endforeach; ?>
	</tbody>
</table>
	</div>
</div>