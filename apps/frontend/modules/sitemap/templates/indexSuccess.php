<div id='sitemap'>
    <ul>
        <?php foreach ($map as $item): ?>
            <li class='sitemap-level-<?php echo $item->getLevel(); ?>' style='padding-left: <?php echo ($item->getLevel() - 1) * 10; ?>px'><?php echo menu_link_to($item); ?></li>
        <?php endforeach; ?>
    </ul>
</div>