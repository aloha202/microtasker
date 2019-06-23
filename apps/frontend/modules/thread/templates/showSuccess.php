<?php echo page_header($page); ?>

<table class='table table-striped'>
  <tbody>
    <tr>
      <th><?php echo __('Id'); ?>:</th>
      <td><?php echo $thread->getId() ?></td>
    </tr>
    <tr>
      <th><?php echo __('Name'); ?>:</th>
      <td><?php echo $thread->getName() ?></td>
    </tr>
    <tr>
      <th><?php echo __('User'); ?>:</th>
      <td><?php echo $thread->getUserId() ?></td>
    </tr>
  </tbody>
</table>

<?php if($thread->isMy()): ?>
<div class='control-group'>
    <?php echo link_to(__('Edit'), url_for("thread_edit", $thread), array('class' => 'btn btn-primary btn-edit')) ?>
    <?php echo link_to(__('Delete'), url_for("thread_delete", $thread), array('class' => 'btn btn-primary btn-danger', 'post' => true)) ?>
</div>
<?php endif; ?>
