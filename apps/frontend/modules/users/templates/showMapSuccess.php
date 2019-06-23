<?php if(isset($page)): echo page_header($page, $profile); endif; ?>

<div class='row-fluid'>
    
    <div class='span2'>
        <?php include_component('users', 'menu', array('profile' => $profile)); ?>
    </div>
    <div class='span10'>
        <?php if($profile->hasGeo()): ?>
            <div class='well'><?php echo $profile->getGeoAddressFormatted(); ?></div>
            <?php         embed_gmap($profile, 'width: 500px; height: 300px;'); ?>
        <?php else: ?>
        <p><?=__('Этого пользователя пока нет на карте'); ?></p>
        <?php endif; ?>
    </div>
</div>
