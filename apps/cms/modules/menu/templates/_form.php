<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="sf_admin_form">
    <form method="post" action="<?php echo $form->isNew() ? url_for('@menu_item_create?param=' . $sf_request->getParameter('param')) : url_for('menu_item_update', array('param' => $sf_request->getParameter('param'), 'sf_subject' => $form->getObject())) ?>" <?php if($form->isMultipart()): ?>enctype='multipart/form-data'<?php endif; ?>>
        <?php if(!$form->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('menu/form_fieldset', array('menu_item' => $menu_item, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('menu/form_actions', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>


<script type="text/javascript">

    $(function(){
        $('#<?php echo $form['type']->renderId(); ?>').each(function(){
            var $this = $(this);
            var $inputs = $('#<?php echo $form['page_id']->renderId(); ?>, #<?php echo $form['cms_module_id']->renderId(); ?>, #<?php echo $form['route']->renderId(); ?>, #<?php echo $form['external']->renderId(); ?>')
            function change()
            {
                $inputs.parents('.sf_admin_form_row').hide();
                switch($this.val()){
                    case 'page':
                        $('#<?php echo $form['page_id']->renderId(); ?>').parents('.sf_admin_form_row').show();
                        break;
                    case 'module':
                        $('#<?php echo $form['cms_module_id']->renderId(); ?>').parents('.sf_admin_form_row').show();
                        break;
                    case 'route':
                        $('#<?php echo $form['route']->renderId(); ?>').parents('.sf_admin_form_row').show();
                        break;
                    case 'external':
                        $('#<?php echo $form['external']->renderId(); ?>').parents('.sf_admin_form_row').show();
                        break;                        
                }
            }
            
            change();
            $this.change(change);
        });
    });

</script>