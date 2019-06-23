<div id="page_text">
    <?php echo page_header($news); ?>
    <div class="news_content">
        <div class="date"><?php echo project_date($news->getDate()); ?></div>
        <?php echo $news->getRaw('content'); ?>
    </div>

</div>

<?php echo link_to('Назад к новостям', 'news/index'); ?>