<?php echo page_header($page, $profile); ?>


<div class='row-fluid'>
    
    <div class='span2'>
        <?php include_component('users', 'menu', array('profile' => $profile)); ?>
    </div>
    <div class='span10'>
        <img src='<?php echo $profile->getImageThumbnail('small'); ?>' align='right' />
        <p>
            <strong><?=__('Дата рождения') ?></strong>: <?php echo project_date($profile->getDob()); ?>
        </p>
        <p>
            <strong><?=__('Телефон') ?></strong>: <?php echo $profile->getPhone(); ?>
        </p>
        <p>
            <strong><?=__('О себе') ?></strong>: <?php echo $profile->getAbout(); ?>
        </p>        
    </div>    
    
</div>