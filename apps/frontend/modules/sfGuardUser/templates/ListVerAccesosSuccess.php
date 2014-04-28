<h3>Accesos para <?php echo $usuario->getUsername();?></h3>
<table class="table table-bordered table-striped">
  <tr>
    <th>Producto a integrar</th>
    <th>Estado</th>
    <th>Acciones</th>
  </tr>
  <?php foreach($sf_data->getRaw('productos') as $item):?>
  <?php $up = UsuarioPlataforma::factory($item, $usuario->getUsername());?>
  <tr>
    <th><?php echo $item->getNombre();?></th>
    <td><label class="label label-<?php echo $up->getEstadoLabel();?>"><?php echo $up->getEstadoTexto();?></label></td>
    <td>
      <?php if($up->noExiste()):?>
        <a href="<?php echo url_for('sfGuardUser/crearUsuario');?>;?>" data-method="post" class="btn">Crear usuario</a>
      <?php else:?>
        <a href="<?php echo url_for('sfGuardUser/restablecerUsuario');?>;?>" data-method="post" class="btn">Actualizar datos</a>
        <a href="<?php echo url_for('sfGuardUser/bajaUsuario');?>;?>" data-method="post" class="btn">Baja usuario</a>
      <?php endif;?>
    </td>
  </tr>
 <?php endforeach;?>
</table>