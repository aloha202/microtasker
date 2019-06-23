<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form action="<?php echo url_for('blog/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class='form-horizontal'>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<fieldset>






      <?php echo $form ?>
      <div class="form-actions">
          <input type="submit" value="Save" class="btn btn-primary" />
          &nbsp;<a href="<?php echo url_for('blog/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'blog/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          
      </div>
</fieldset>
</form>
