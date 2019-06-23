<?php use_helper('Date') ?>
<?php include_partial('localization/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Localization List', array(), 'messages') ?></h1>
  <p class='help'><?=__('Вы можете править текст прямо в списке. Исправьте все, что считаете нужным, а затем нажмите TAB или щелкните мышью в любом месте вне поля ввода.'); ?></p>
  <p class='help'><?=__('Воспользуйтесь фильтром, чтобы найти нужный вам текст'); ?></p>  
  <?php include_partial('localization/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('localization/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('localization/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
      <div id="localization_list">
    <?php include_partial('localization/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
      </div>
    <ul class="sf_admin_actions">
      <?php include_partial('localization/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('localization/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('localization/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
