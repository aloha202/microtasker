<div class="box box-primary">
	<div class="box-header">
		<div class='col-md-8'>
		<h3 class="box-title">Backlog</h3>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<form method='post' action='<?php echo url_for('backlog/add'); ?>'>
				<div class="col-xs-10">
					<textarea name="description" style="width: 100%" ></textarea>
				</div>
				<div class="col-xs-2">			
					<input type='submit' value="Add" class="btn btn-block btn-primary" >
				</div>
			</form>
		</div>
	</div><!-- /.box-body -->
</div><!-- /.box -->
<?php foreach ($Backlogs as $Backlog): ?>
	<div class="box">
		<div class="box-body">
			<?php echo $Backlog->getDescription(); ?>
		</div><!-- /.box-body -->

		<div class="box-footer">
			<a href="<?php echo url_for('microtask/fromBacklog?id=' . $Backlog->getId()); ?>" class="btn btn-primary"><?php echo __('В микротаск'); ?></a>
		</div><!-- /.box-footer-->

	</div><!-- /.box -->
<?php endforeach; ?>