<td>

  <ul class="sf_admin_td_actions">
  <?php if($menu_item->getLevel() != 0): ?>        
    <?php echo $helper->linkToEdit($menu_item, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
  <?php else: ?>
      <li>
            <?php echo link_to(__('Manage tree', array(), 'cms'), 'menu/tree?root=' . $menu_item->getRootId()); ?>          
      </li>
  <?php endif; ?>      
  </ul>
</td>
