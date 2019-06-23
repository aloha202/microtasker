<?php if($pager->count()): ?>
<?php include_partial('thread/list', array('pager'=>$pager)) ?>

<?php include_partial('thread/pager', array('pager'=>$pager)) ?>
<?php else: ?>
<div class='box'>
	<div class='box-body'>
		<?php echo $page->getRaw('content'); ?>
	</div>
</div>
<?php endif; ?>
<a href="<?php echo url_for('thread/new'); ?>" class='btn btn-default'><i class='fa fa-plus'></i> Создать</a>
