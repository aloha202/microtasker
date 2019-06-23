<?php echo page_header($page->getName()); ?>

<table class='table table-striped'>
  <thead>
    <tr>
      <th>&nbsp;</th>        
      <th><?=__('Имя'); ?></th>
      <th><?=__('Город'); ?></th>      
      <th><?=__('Last login'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($profiles as $profile): ?>
    <tr>
      <td><a href="<?php echo url_for('users_show', $profile) ?>"><img src='<?php echo $profile->getImageThumbnail('tiny') ?>' width='40' height='40' /></a></td>        
      <td><a href="<?php echo url_for('users_show', $profile) ?>"><?php echo $profile->getName() ?></a></td>
      <td><?php echo $profile->getGeoCity() ?></td>      
      <td><?php echo project_datetime($profile->getLastLogin()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
