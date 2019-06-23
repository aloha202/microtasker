<?php foreach (ProjectHelper::getMenu('main') as $item): ?>
    <?php if ($item->getLevel() == 1): ?>
        <?php echo menu_link_to($item, '<li  class="%class%"><a href="%url%">%icon%%name%</a></li>'); ?>
    <?php endif; ?>
<?php endforeach; ?>   

<?php if(!$sf_user->isAuthenticated()): ?>
<li <?php if($sf_context->getModuleName() == 'auth'): ?>class='active'<?php endif; ?>><a href='<?php echo url_for('auth/signin'); ?>'><i class='icon-large icon-user'>&nbsp;</i>&nbsp;<?=__('Вход') ?></a></li>
<?php else: ?>
<li class='dropdown <?php if($sf_context->getModuleName() == 'profile'): ?>active<?php endif; ?>'><a href='#' class="dropdown-toggle" data-toggle="dropdown"><?php echo $sf_user->getGuardUser(); ?>&nbsp;<b class="caret"></b></a>
    <ul class='dropdown-menu'>
        <li><a href='<?php echo url_for('profile/index'); ?>'><?=__('Профиль') ?></a></li>
        <li><a href='<?php echo url_for('auth/signout'); ?>'><?=__('Выход') ?></a></li>
        <?php if($sf_user->getGuardUser()->getIsSuperAdmin()): ?>
        <li class='divider'></li>
        <li><a href='/cms.php' target='_blank'><?=__('Админка') ?></a></li>     
        <?php endif;?>
    </ul>
</li>
<?php endif; ?>
