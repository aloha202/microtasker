<?php use_stylesheet('nested-set.css') ?>
<td class="sf_admin_text sf_admin_list_td_name nested_set">
  <span class="<?php echo $menu_item->getNode()->isLeaf() ? 'leaf' : 'node' ?>" 
        style="<?php echo 'margin-left: ' . ($menu_item['level'] * 1.3) . 'em' ?>">
    <?php echo link_to($menu_item->getName(), url_for('menu_item_edit', array('sf_subject' => $menu_item, 'param' => $sf_request->getParameter('param')))); ?>
  </span>
</td>