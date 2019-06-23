<?php echo page_header($page); ?>

<?php include_partial('thread/list', array('pager'=>$pager)) ?>

<?php include_partial('thread/pager', array('pager'=>$pager)) ?>