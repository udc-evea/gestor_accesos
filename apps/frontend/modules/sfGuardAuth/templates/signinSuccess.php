<h3>Ingreso al sistema</h3>

<div class="mod login">
  <div class="inner">
    <div class="hd center"></div>
    <div class="bd">
      <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-horizontal">
        <?php echo $form->renderHiddenFields(); ?>
        <fieldset class="loginFieldset">
          <div class="control-group <?php echo $form['username']->hasError() ? 'error': '' ?>">
            <?php echo $form['username']->renderRow() ?>
          </div>
          <div class="control-group <?php echo $form['password']->hasError() ? 'error': '' ?>">
            <?php echo $form['password']->renderRow() ?>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="icon icon-off icon-white"></i> Ingresar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>


<script>
  $(function(){
    $('#signin_username').attr('autocomplete', 'off').focus();
    });
</script>