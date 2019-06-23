<ul class='system_dev_list system_dev_list_users'>
<?php foreach($users as $user): ?>
    <li class="<?php if($sf_user->isAuthenticated() && $sf_user->getGuardUser()->getId() == $user->getId()): ?>system_dev_current<?php endif; ?>">
        <a href='<?php echo url_for('dev/userLogin?id=' . $user->getId()); ?>'><?php echo $user; ?></a>
    </li>
<?php endforeach; ?>
</ul>

<script type='text/javascript'>

    $('.system_dev_list_users a').click(function(){
        var $this = $(this);        
        $.get(this.href, {}, function(resp){
           if(resp == 'ok'){
               $('.system_dev_list_users li').removeClass('system_dev_current');
               $this.parent().addClass('system_dev_current');
           }
        });
        return false;
    });

</script>
