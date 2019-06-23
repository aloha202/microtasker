<?php if (isset($page)): echo page_header($page);
endif; ?>

<?php echo page_well($page, $bridge); ?>
<div class='form'>
    <form method='post'  action='<?php echo url_for('@oauth_bridge_confirm'); ?>'>    
        <div class='line'>
            <div class='field'>
                <input placeholder="Введите код подтверждения" type="text" name="token"  />
            </div>
        </div>
      <a class='btn submit' href='#'><?=__('Подтверждаю!') ?></a>        
    </form>
</div>
