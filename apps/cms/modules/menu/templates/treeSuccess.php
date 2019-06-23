<div class="relpos">
    <div id="menu_create_page">
        <label for="menu_create_page_checkbox"><?php echo __('Auto create page', array(), 'cms'); ?></label>
        <input type="checkbox" id="menu_create_page_checkbox" <?php if (MyConfig::get('menu_create_page') == 1): ?>checked<?php endif; ?> />
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#menu_create_page_checkbox').change(function(){
            $.get('<?php echo url_for('util/configMenuCreatePage'); ?>', {value: Number(this.checked)}, function(resp){
               
            });
        });
    });
</script>

<?php
use_helper("sfJqueryTreeDoctrine");
echo get_nested_set_manager("MenuItem", "name", $sf_request->getParameter('param'));
?>
