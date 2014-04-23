<h3>Accesos para <?php echo $usuario->getUsername();?></h3>
<table class="table table-bordered table-striped">
  <tr>
    <th>Producto a integrar</th>
    <th>Estado</th>
    <th>Acciones</th>
  </tr>
  <?php foreach($productos as $item):?>
  <tr>
    <th><?php echo $item->getNombre();?></th>
    <td><?php echo $item->verificarUsuario($usuario);?></td>
    <td>
      <a href="#" class="btn">Crear usuario</a>
      <a href="#" class="btn">Actualizar datos</a>
    </td>
  </tr>
 <?php endforeach;?>
</table>