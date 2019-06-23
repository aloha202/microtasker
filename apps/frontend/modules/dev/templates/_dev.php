<?php if(sfConfig::get('sf_environment') == 'dev' && $sf_request->getHttpHeader('addr', 'remote') == '127.0.0.1'): ?>

    
    <script type='text/javascript'>
    
        <?php echo file_get_contents(sfConfig::get('sf_web_dir') . '/js/system_dev.js'); ?>
    
    
    </script>
    
    <div class='system_dev_window'>
        <div class='system_dev_handle'></div>
        
        <div class='system_dev_content'>
            <div class='system_dev_tabs'>
                <div class='system_dev_tab system_dev_tab_users'>Users</div>
                <div class='system_dev_tab system_dev_tab_other'>Other</div>
            </div>
            <div class='system_dev_tabcontent system_dev_tabcontent_users'>
                <?php include_component('dev', 'users'); ?>
            </div>
            <div class='system_dev_tabcontent system_dev_tabcontent_other'>
                [under construction]
            </div>
        </div>
    </div>
<?php endif; ?>
