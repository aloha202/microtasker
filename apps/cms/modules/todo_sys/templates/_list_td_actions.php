<td>
  <ul class="sf_admin_td_actions">
	<?php if($todo->getStatus() == 'open'): ?>
	<li class='sf_admin_td_action'><a href='<?php echo url_for('todo_sys/done?id=' . $todo->getId()); ?>'><?php echo __('Сделано!'); ?></a></li>
	<?php else: ?>
	<li class='sf_admin_td_action'><a href='<?php echo url_for('todo_sys/return?id=' . $todo->getId()); ?>'><?php echo __('Возвратить'); ?></a></li>	
	<?php endif; ?>
    <?php echo $helper->linkToDelete($todo, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
