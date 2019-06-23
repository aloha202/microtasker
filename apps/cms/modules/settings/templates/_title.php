<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo __($config->getTitle()); ?><br />
<?php if($config->getHelp()): ?>
<i><?php echo __($config->getHelp()); ?></i>
<?php endif; ?>