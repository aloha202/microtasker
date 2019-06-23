<?php echo page_header($page); ?>
<?php include_component('profile', 'menu'); ?>
<div class="form">
    <form method="post" action="" enctype="multipart/form-data">
        <?php echo $form->renderHiddenFields(); ?>
            <?php echo $form['gmaps']; ?>

        <br />
        <div class='control-group'>
            <input type="submit" value="<?=__('Сохранить'); ?>" class='btn' />
        </div>
    </form>
</div>