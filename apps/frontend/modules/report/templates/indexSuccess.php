<div class='box'>
	<div class='box-body'>
		<?php if ($Reports->count()): ?>
			<table class='table table-striped'>
				<thead>
					<tr>
						<th><?php echo __('Дата'); ?></th>
						<th><?php echo __('Кол-во задач'); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Reports as $Report): ?>
					<td><?php echo project_date($Report->created_at); ?></td>
					<td><?php echo $Report->microtask_count; ?></td>			
					<td>
						<a href="<?php echo url_for('report/show?id=' . $Report->id) ?>" class='btn btn-sm btn-default' title="<?php echo __('Просмотр') ?>" ><i class='fa fa-info'></i></a>            						
					</td>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<?php echo $page->getRaw('content'); ?>
		<?php endif; ?>
	</div>
</div>