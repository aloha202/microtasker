<div class='down_block_content'>

    <div class='img'>
        <a href="<?php echo url_for('news_show', $news); ?>"><img src='<?php echo $news->getTiny(); ?>'/></a>
    </div>

    <div class='text'>
        <div class='text_head'>
            <?php echo project_date($news->getDate()); ?>
        </div>

        <div class='text_content'>
            <?php echo $news->getRaw('brief'); ?>
        </div>

        <div class='button'>
            <div class='betton_descr'>
                <a href="<?php echo url_for('news_show', $news); ?>">Read more</a>
            </div>
        </div>
    </div>

</div>

<a href='<?php echo url_for('news/index'); ?>'>
    <div class='down_block_but'>
        <div class='down_block_but_right'>							
            <div class='down_block_but_left'>
                <div class='button_descr'>
                    MORE NEWS
                </div>
            </div>							
        </div>
    </div>
</a>