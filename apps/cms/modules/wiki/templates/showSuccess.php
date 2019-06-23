
<div class='page_simple'>
<h1><?php echo $wiki; ?></h1>

<?php echo $wiki->getRaw('content'); ?>
</div>


<ul class='sf_admin_actions'>
    <li class='sf_admin_action_edit'><a href='<?php echo url_for('wiki/edit?id=' . $wiki->getId()); ?>'><?php echo __('Edit'); ?></a></li>
</ul>