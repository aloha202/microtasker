<?php foreach($wikis as $wiki): ?>
<li class='item'><a href='<?php echo url_for('wiki/show?id=' . $wiki->getId()); ?>'><?php echo $wiki; ?></a></li>
<?php endforeach; ?>