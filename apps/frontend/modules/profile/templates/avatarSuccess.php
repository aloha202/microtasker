<?php include_component('profile', 'menu'); ?>


<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<form method="post" action="" enctype="multipart/form-data" class='form-horizontal' id='profile_form_avatar'>
				<div class="box-body">
					<table cellpadding="0" cellspacing="0">
						<?php echo $form; ?>
					</table>
				</div>
				<?php if ($profile->getImage()): ?>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary"><?= __('Сохранить') ?></button>
					</div>	
					<a href='<?php echo url_for('profile/avatarDelete'); ?>' onclick='return window.confirm("<?= __('Вы уверены?') ?>")' class='btn btn-danger'><?= __('Удалить фотографию') ?></a>
				<?php else: ?>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary"><?= __('Загрузить фото') ?></button>
					</div>	
				<?php endif; ?>
			</form>
		</div>
	</div>
</div>

<script type='text/javascript'>

    $(function(){
        var phImageBuilder = null;
        if(window.phImageBuilder){
            window.phImageBuilder.onSelectionStart(function(self){
				phImageBuilder = self;
            });
            window.phImageBuilder.onSelectionSave(function(self){
				phImageBuilder = null;
            });            
            window.phImageBuilder.onSelectionCancel(function(self){
				phImageBuilder = null;
            });            

            $('#profile_form_avatar').submit(function(){
                if(phImageBuilder){
                    phImageBuilder.saveSelection();                    
                    return false;
                }
                
            });
        }

    });

</script>