<?php

$url = $_SERVER['REQUEST_URI'];
?>
<img src='<?php echo url_for('default/visit'); ?>?url=<?php echo $url; ?>' border='0' frameborder='0' width='87' height='23' />