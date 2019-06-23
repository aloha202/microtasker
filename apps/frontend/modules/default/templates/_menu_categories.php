<ul>
    <?php foreach($categories as $cat): ?>
        <?php if($cat->getLevel() == 1): ?>
            <li <?php if($sf_context->isActiveCategory($cat) && $cat->getNode()->hasChildren()): ?>class='open'<?php endif; ?>><a href='<?php echo url_for('catalog_category_show', $cat); ?>' <?php if($sf_context->isActiveCategory($cat)): ?>class='active'<?php endif; ?>><?php echo $cat; ?></a>
                <?php if($sf_context->isActiveCategory($cat)): ?>
                    <?php if($cat->getNode()->hasChildren()): ?>
                        <ul>
                            <?php foreach($cat->getNode()->getChildren() as $child): ?>
                                <li><a href='<?php echo url_for('catalog_category_show', $child); ?>'<?php if($sf_context->isActiveCategory($child)): ?> class='active'<?php endif; ?>><?php echo $child; ?></a></li>
                            <?php endforeach; ?>
                        </ul>                
                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>