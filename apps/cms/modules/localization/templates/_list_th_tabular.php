<?php slot('sf_admin.current_header') ?>

    <?php foreach($sf_context->get('langs') as $lang): ?>
        <th><?php echo $lang; ?></th>
    <?php endforeach; ?>

<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>