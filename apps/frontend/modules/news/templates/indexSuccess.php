<div id="page_text">

<?php echo page_header('Последние новости'); ?>
<?php if ($pager->getNbResults()): ?>

        <div class="items">
            <?php foreach ($pager->getResults() as $news): ?>

                <div class="item">
                    <?php if($news->getImage()): ?>
                    <div class="img">
                        <a href="<?php echo url_for('news_show', $news); ?>">
                            <img src="<?php echo $news->getThumbnail(); ?>" alt="" />
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="txt">
                        <h3><a href="<?php echo url_for('news_show', $news); ?>"><?php echo $news; ?></a></h3>
                        <div class="date">
                            <?php echo project_date($news->getDate()); ?>
                        </div>
                        <p><?php echo $news->getRaw('brief'); ?></p>
                    </div>
                    <div class="clr"></div>
                </div>            
            <?php endforeach; ?>
        </div>
    
    <?php include_pager($pager, url_for('news/index')); ?>
    

<?php endif; ?>
</div>