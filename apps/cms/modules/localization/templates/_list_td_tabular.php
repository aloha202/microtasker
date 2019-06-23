    <?php foreach($sf_context->get('langs') as $lang): ?>

        <?php if($lang == $sf_context->get('project_lang')): ?>
        <td class="sf_admin_text sf_admin_list_td_<?php echo $lang; ?> textarea_field">
          <?php echo get_component('localization', 'ff', array('type' => 'list', 'field' => $lang, 'localization' => $localization)) ?>
        </td>
        <?php else: ?>
        <td class="sf_admin_text sf_admin_list_td_<?php echo $lang; ?>">
              <?php echo $localization->get($lang) ?>
            </td>        
        <?php endif; ?>

    <?php endforeach; ?>

