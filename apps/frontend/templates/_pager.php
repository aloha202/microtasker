<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>    
<?php if($pager->haveToPaginate()): ?>
<div class="pager">
    <!-- <a href="<?php echo $url; ?>?page=1">&lt;&lt;</a> -->
    <?php if($pager->getPage() != 1): ?>
        <a href="<?php echo $url; ?>?page=<?php echo $pager->getPage() - 1; ?>" class="prev"><img src="/images/prev.png" alt="" /></a>
    <?php endif; ?>
    <?php foreach($pager->getLinks(20) as $page): ?>
        <?php if($page != $pager->getPage()): ?>
            <a href="<?php echo $url ?>?page=<?php echo $page; ?>"><?php echo $page; ?></a>
        <?php else: ?>
            <span><?php echo $page; ?></span>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if($pager->getPage() != $pager->getLastPage()): ?>
        <a href="<?php echo $url; ?>?page=<?php echo $pager->getPage() + 1; ?>" class="next"><img src="/images/next.png" alt="" /></a>
    <?php endif; ?>
    <!--
    <a href="<?php echo $url; ?>?page=<?php echo $pager->getLastPage(); ?>">&gt;&gt;</a>
    -->
</div>

<?php endif; ?>