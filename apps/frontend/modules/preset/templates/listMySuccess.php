<?php if($pager->count()): ?>
<?php include_partial('preset/list', array('pager'=>$pager)) ?>

<?php include_partial('preset/pager', array('pager'=>$pager)) ?>
<?php else: ?>
<div class='box'>
	<div class='box-body'>
		<?php echo $page->getRaw('content'); ?>
	</div>
</div>
<?php endif; ?>
<a href="<?php echo url_for('preset/new'); ?>" class='btn btn-default'><i class='fa fa-plus'></i> Создать</a>
