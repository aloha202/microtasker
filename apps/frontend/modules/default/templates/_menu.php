<a href='<?php echo url_for('catalog/index'); ?>'>Витамины</a>
<?php foreach ($types as $type): ?>
    <a href='<?php echo url_for('catalog_type_show', $type); ?>' <?php if($sf_context->matchId('catalog.type', $type->getId())): ?>class='active'<?php endif; ?>><?php echo $type; ?></a>
<?php endforeach; ?>
<a href='<?php echo url_for('brands/index'); ?>' <?php if($sf_context->getModuleName() == 'brands'): ?>class='active'<?php endif; ?>>Бренды</a>