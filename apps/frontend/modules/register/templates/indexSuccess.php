<?php echo page_header('Registration'); ?>

<form method="post" action="">
    <table cellpadding="0" cellspacing="0">
    <?php echo $form; ?>
    </table>
    <input type="submit" value="Register" />
    
    
</form>


<?php echo form_choice_dependency('type', array(
    'fiz' => array('name', 'about'), 'jur' => array('company_name', 'company_vat')
), $form, '2parents', 'fade'); ?>

<?php echo form_toggle_dependency('is_newsletter', array('newsletter_address'), $form, '2parents', 'fade'); ?>