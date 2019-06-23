<div class="sf_admin_list">
    <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
    <?php else: ?>
    <table cellspacing="0">
        <thead>
            <tr>
                                    <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" /></th>
                                <?php include_partial('todo_sys/list_th_tabular', array('sort' => $sort)) ?>
                                    <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
                            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="5">
                    <?php if ($pager->haveToPaginate()): ?>
                    <?php include_partial('todo_sys/pagination', array('pager' => $pager)) ?>
                    <?php endif; ?>

                    <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
                    <?php if ($pager->haveToPaginate()): ?>
                    <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($pager->getResults() as $i => $todo): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <tr class="sf_admin_row <?php echo $odd ?> <?php echo $todo->getStatus(); ?>">
                                    <?php include_partial('todo_sys/list_td_batch_actions', array('todo' => $todo, 'helper' => $helper)) ?>
                                <?php include_partial('todo_sys/list_td_tabular', array('todo' => $todo)) ?>
                                    <?php include_partial('todo_sys/list_td_actions', array('todo' => $todo, 'helper' => $helper)) ?>
                            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<script type="text/javascript">
    /* <![CDATA[ */
        
    $(function(){
        $('#sf_admin_list_batch_checkbox').change(function(){
            $('.sf_admin_batch_checkbox').prop('checked', this.checked);
        });
            });
    


    /* ]]> */
</script>


