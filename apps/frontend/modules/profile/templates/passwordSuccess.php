
<?php include_component('profile', 'menu'); ?>


<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
			<form method="post" action="" enctype="multipart/form-data" >
				<div class='box-body'>
					<?php echo $form; ?>
				</div>

				
					<!-- Button -->
					<div class="box-footer">
						<button class="btn btn-primary" type="submit"><?= __('Сохранить пароль') ?></button>           
					</div>
			</form>
		</div>
	</div>
</div>