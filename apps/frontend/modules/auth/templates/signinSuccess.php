<?php /*

  <?php echo page_header($page); ?>

  <?php echo page_well($page); ?>

  <?php include_partial('auth/form', array('form' => $form, 'page' => $page)); ?>
 * 
 * 
 */ ?>
<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
			<form role="form" class="js-form-control" method="post" action="<?php echo url_for('auth/signin'); ?>">
				<div class="box-body">
					<?php echo $form; ?>
				</div><!-- /.box-body -->

				<div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo __('Войти'); ?></button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
			<div class='register-link'>
				<a href="<?php echo url_for_system_page('about'); ?>" class="grey about">Что это такое?</a>
				<a href="<?php echo url_for('auth/register'); ?>"><?php echo __('Регистрация'); ?></a>
				<a href="<?php echo url_for('contactus/index'); ?>" class="grey small feedback">Обратная связь</a>				
			</div>
		</div><!-- /.box -->
	</div>	
</div>
