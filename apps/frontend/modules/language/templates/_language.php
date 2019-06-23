<div id='language_switch'>
    <form action="<?php echo url_for('change_language') ?>">
        <table cellpadding='0' cellspacing='0'>
            <?php echo $form ?>
        </table>
    </form>   
</div>

<script type='text/javascript'>

    $('#language_switch select').change(function(){
        this.form.submit();
    });
    
</script>