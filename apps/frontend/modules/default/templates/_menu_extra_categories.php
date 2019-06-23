<ul>
    <?php foreach($types as $t): ?>
            <li><a href='<?php echo url_for('catalog_type_show', $t); ?>' <?php if($sf_context->matchId('catalog.type', $t->getId())): ?>class='active'<?php endif; ?>><?php echo $t; ?></a></li>
    <?php endforeach; ?>
</ul>