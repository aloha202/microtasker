<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div>
    <strong>Name: </strong>
    <?php echo $name; ?>
</div>

<div>
    <strong>Email: </strong>
    <?php echo $email; ?>
</div>
<?php if($phone): ?>
<div>
    <strong>Phone: </strong>
    <?php echo $phone; ?>
</div>
<?php endif; ?>

<p><?php echo nl2br($comment); ?></p>