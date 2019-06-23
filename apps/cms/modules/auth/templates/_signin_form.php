<form action="<?php echo url_for('auth/signin') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />

        </td>
      </tr>
    </tfoot>
  </table>
</form>