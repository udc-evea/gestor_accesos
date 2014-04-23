<?php
  $user = $sf_user->getAttribute('udc_hash_old');
  $pass = $sf_user->getAttribute('udc_hash_new');
  $hash = $sf_user->getAttribute('udc_hash_plus');
?>
<div class="row-fluid">
  <ul class="thumbnails">
    <?php foreach($prods as $item):?>
    <li class="span4">
        <div class="thumbnail">
          <img src="http://placehold.it/220x100" alt="<?php echo $item->getNombre();?>">
          <div class="caption">
            <h3><?php echo $item->getNombre();?></h3>
            <p><?php echo $item->getDescripcion();?></p>
            <p align="center">
            <form method="post" action="<?php echo $item->getUrlLogin();?>">
              <input type="hidden" name="old" value="<?php echo $user;?>"/>
              <input type="hidden" name="new" value="<?php echo $pass;?>"/>
              <input type="hidden" name="plus" value="<?php echo $hash;?>"/>
              <button type="submit" class="btn btn-block login_producto <?php echo $item->getNombreCorto();?>" >Ingresar</a></p>
            </form>
          </div>
        </div>
      </li>
      <?php endforeach;?>
  </ul>
  <?php if($sf_user->isSuperAdmin()):?>
  <p class="text-right"><small><a class="muted" href="<?php echo url_for('@sf_guard_user');?>">Administración</a></small></p>
  <?php endif;?>
</div>

<script>
$(function(){
  Productos.init('<?php echo $user;?>', '<?php echo $pass;?>', '<?php echo $hash;?>');
});
</script>