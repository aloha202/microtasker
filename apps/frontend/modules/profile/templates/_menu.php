<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="menu profile_menu">
    <?php foreach ($menu->getRawValue() as $item): ?>
        <?php echo link_to(__($item[0]), 'profile/' . $item[1], $item[2]); ?>
        <span>|</span>
    <?php endforeach; ?>
</div>