<td>
    <ul class="sf_admin_td_actions">    
        <li class="sf_admin_action">
            <?php echo link_to(__('Manage tree', array(), 'cms'), 'menu/tree?root=' . $menu_item->getRootId()); ?>
        </li>
        <li class="sf_admin_action">
            <?php echo link_to(__('Manage content', array(), 'cms'), 'menu/index?param=' . $menu_item->getRootId()); ?>
        </li>        
    </ul>        
</td>