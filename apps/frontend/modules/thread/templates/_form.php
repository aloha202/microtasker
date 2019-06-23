<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $url = $form->isNew() ? url_for('thread/create') : url_for('thread_update', $form->getObject()); ?>

			<form action="<?php echo $url; ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class='js-form-control'>
				<div class="box-body">
					<?php echo $form ?>
				</div>
				<div class='box-footer'>
					<a href="<?php echo url_for('thread/listMy'); ?>" class='btn btn-default'><i class='fa fa-mail-reply-all'></i></a>					
					<input type='submit' value="<?php echo __('Save') ?>" class='btn btn-primary' />
				</div>
			</form>