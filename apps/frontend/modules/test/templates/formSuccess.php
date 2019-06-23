<?php echo page_header('Тестовая форма'); ?>

<form class='form-horizontal' method='post' action=''>
    
    
    <?php echo $form; ?>
    
    <input type='submit' value='Submit' class='btn' />
</form>

<?php echo form_choice_dependency('type', array(
    'fiz' => array('name', 'email_address', 'phone'), 'jur' => array('company_name', 'company_phone', 'company_inn', 'company_address', 'company_ceo_name')
), $form, 'bootstrap', 'fade'); ?>

<?php echo form_toggle_dependency('is_subscribe', array('subscribe_email'), $form, 'bootstrap', 'fade'); ?>