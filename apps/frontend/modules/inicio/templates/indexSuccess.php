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
            <?php include_partial('inicio/form_acceso', array('item' => $item));?>
          </div>
        </div>
      </li>
      <?php endforeach;?>
  </ul>
  <?php if($sf_user->isSuperAdmin()):?>
  <p class="text-right"><small><a class="muted" href="<?php echo url_for('@sf_guard_user');?>">Administración</a></small></p>
  <?php endif;?>
</div>