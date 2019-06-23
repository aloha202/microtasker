<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type='text/javascript'>

    var availableTags = [];
    <?php foreach($tags as $tag): ?>
        availableTags.push('<?php echo $tag['name']; ?>');
        <?php endforeach; ?>

</script>