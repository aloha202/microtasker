<?php include_component('profile' , 'menu'); ?>    

<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<!-- form start -->
			<form role="form" class="js-form-control" method="post" action="<?php echo url_for('profile/index'); ?>">
				<div class="box-body">
					<?php echo $form; ?>
				</div>
				<div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
				</div>				
			</form>
		</div>
	</div>
</div>



<?php /*
<?php echo page_header($page); ?>
<?php include_component('profile' , 'menu'); ?>    
<?php echo page_well($page); ?>

<form class="form-horizontal" action="" method='post'>
    <fieldset>
        <?php echo $form; ?>
        <div class="control-group">
            <div class="controls controls-center">        
            <button type="submit" class="btn"><?=__('Сохранить изменения') ?></button>
            </div>
        </div>
            <?php //<button type="button" class="btn">Cancel</button> ?>
    </fieldset>
</form>
*/ ?>
<?php /*echo form_choice_dependency('type', array(
    'fiz' => array('name', 'about'), 'jur' => array('company_name', 'company_vat')
), $form, '2parents', 'fade'); ?>

<?php echo form_toggle_dependency('is_newsletter', array('newsletter_address'), $form, '2parents', 'fade'); */?>