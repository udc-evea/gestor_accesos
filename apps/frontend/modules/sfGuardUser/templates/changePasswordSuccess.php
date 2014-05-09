<?php use_helper('I18N'); ?>
<div class="mod login">
  <div class="inner">
    <div class="hd center"></div>
    <div class="bd">
      <form action="<?php echo url_for('@sf_guard_change_password') ?>" method="post" class="form-horizontal">
        <?php echo $form->renderHiddenFields(); ?>
        <fieldset class="loginFieldset">
          <legend>Cambiar mi contraseña</legend>
          <?php echo $form->render(); ?>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>