<?php echo page_header($page); ?>

<table class='table table-striped'>
  <tbody>
    <tr>
      <th><?php echo __('Id'); ?>:</th>
      <td><?php echo $microtask_preset->getId() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Description'); ?>:</th>
      <td><?php echo $microtask_preset->getDescription() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Type'); ?>:</th>
      <td><?php echo $microtask_preset->getType() ?></td>
    </tr>
    <tr>
      <th><?php echo __('User'); ?>:</th>
      <td><?php echo $microtask_preset->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<?php if($microtask_preset->isMy()): ?>
<div class='control-group'>
    <?php echo link_to(__('Edit'), url_for("preset_edit", $microtask_preset), array('class' => 'btn btn-primary btn-edit')) ?>
    <?php echo link_to(__('Delete'), url_for("preset_delete", $microtask_preset), array('class' => 'btn btn-primary btn-danger', 'post' => true)) ?>
</div>
<?php endif; ?>
