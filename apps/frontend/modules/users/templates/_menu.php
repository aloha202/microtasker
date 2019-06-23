<ul class="nav nav-pills nav-stacked">
    <?php foreach ($menu->getRawValue() as $item): ?>
        <li class='<?php echo !empty($item[2]['class']) ? $item[2]['class'] : ''; ?>'><?php echo link_to(__($item[0]), url_for($item[1], $profile), $item[2]); ?>    </li>
    <?php endforeach; ?>
</ul>