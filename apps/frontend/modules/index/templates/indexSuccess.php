
<?php if(!mt_is_fillet_locked()): ?>
<div class="box box-primary">
	<div class="box-header">
		<div class='col-md-8'>
		<h3 class="box-title" style="display: inline-block">Quick task add</h3>
		<small>или</small>
							<select name="preset" id="preset_select" class="form-control" style="width: 200px; display: inline-block">
						<option value=""><?php echo __('Выбрать заготовку'); ?></option>	
						<?php foreach($Presets as $Preset): ?>
						<option value="<?php echo $Preset->getId(); ?>"><?php echo $Preset; ?></option>							
						<?php endforeach; ?>
					</select>
		</div>
		<?php if(Mt::hasTasks()): ?>
		<div class='col-md-4' style='text-align: right;'>
		<a href='<?php echo url_for('microtask/lockFillet'); ?>' class='btn btn-danger btn-lg'><i class='fa fa-lock'></i> Залочить цепочку</a>
		</div>
		<?php endif; ?>
	</div>
	<div class="box-body">
		<div class="row">
			<form method='post' action='<?php echo url_for('microtask/quickadd'); ?>'>
				<div class="col-xs-8">
					<input type="text" class="form-control" name='microtask'>
				</div>
				<div class="col-xs-2">			
					<select name="priority" class="form-control">
						<option value="down"><?php echo __('Вниз'); ?></option>
						<option value="up"><?php echo __('Вверх'); ?></option>						
						<option value="blocker"><?php echo __('Блокер'); ?></option>												
					</select>
				</div>				
				<div class="col-xs-2">			
					<input type='submit' value="Add" class="btn btn-block btn-primary" >
				</div>
			</form>
		</div>
	</div><!-- /.box-body -->
</div><!-- /.box -->
<?php endif; ?>
<?php foreach ($Tasks as $Task): ?>
	<div class="box box-<?php echo $Task->getStatusCssClass(); ?>">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo project_datetime($Task->getCreatedAt()); ?></h3>
			<?php /*
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
			 * 
			 */ ?>
		</div>
		<div class="box-body">
			<?php echo $Task->getDescription(); ?>
		</div><!-- /.box-body -->
		<?php if($Task->getStatus() == 'new'): ?>
		<div class="box-footer">
			<a href="<?php echo url_for('microtask/complete?id=' . $Task->getId()); ?>" class="btn btn-primary"><?php echo __('Готово'); ?></a>
			<?php if(!$Task->getIsBlocker()): ?>
			<a href="<?php echo url_for('microtask/blocker?id=' . $Task->getId()); ?>" class="btn btn-danger btn-sm"><?php echo __('Блокер'); ?></a>			
			<?php endif; ?>
		</div><!-- /.box-footer-->
		<?php endif; ?>
	</div><!-- /.box -->
<?php endforeach; ?>

<script type='text/javascript'>

	$(function(){
		$('#preset_select').change(function(){
			if($(this).val()){
				document.location.href = "<?php echo url_for('microtask/fromPreset'); ?>?id=" + $(this).val();
			}
		});
	});

</script>
<!-- Main content -->



