<form action="<?php echo $accion_form;?>" method="post">
  <input type="hidden" name="producto" value="<?php echo $producto->getId();?>"/>
  <input type="hidden" name="user" value="<?php echo $usuario->getUsername();?>"/>
  <button type="submit" class="btn">Crear usuario</button>
</form>