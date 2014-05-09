<?php
  $user = $sf_user->getAttribute('udc_hash_old');
  $pass = $sf_user->getAttribute('udc_hash_new');
  $hash = $sf_user->getAttribute('udc_hash_plus');
  
  $target = (!isset($auto)) ? 'target="_blank"' : "";
?>
<form method="post" action="<?php echo $item->getUrlLogin();?>" id="form_<?php echo $item->getNombreCorto();?>" <?php echo $target;?>>
  <input type="hidden" name="old" value="<?php echo $user;?>"/>
  <input type="hidden" name="new" value="<?php echo $pass;?>"/>
  <input type="hidden" name="plus" value="<?php echo $hash;?>"/>
  <?php if(!isset($auto)):?>
    <button type="submit" class="btn btn-block login_producto <?php echo $item->getNombreCorto();?>" >Ingresar</a></p>
  <?php else:?>
    Por favor aguarde...
  <?php endif;?>
</form>
<?php if(isset($auto)):?>
<script>
    $("form").submit();
 </script>
<?php endif; ?>
