<table class='table table-striped'>
  <thead>
    <tr>
                              <th class='name'><?php echo __('Name') ?></th>
                            <th class='user_id'><?php echo __('User') ?></th>
            <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $thread): ?>
    <tr>
                                              <td><?php echo $thread->getName() ?></td>
                                            <td><?php echo $thread->getUserId() ?></td>
                      <td>
<a href="<?php echo url_for('thread_show', $thread) ?>"><?php echo __('View') ?></a>            
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>