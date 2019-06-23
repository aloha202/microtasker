<?php if(isset($page)): echo page_header($page); endif; ?>

<?php echo $page->getReplaced('content', $bridge); ?>
<br />
<br />
<form method='post' action=''>
    <input type='submit' name='confirm' value='<?=__('Да, это мой email-аккаунт!') ?>' class='btn' />
</form>
