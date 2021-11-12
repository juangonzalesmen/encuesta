<!--LO TRABAJAN DESDE AQUI-->
<?php require "vistas/admin/admin_config/admin_header.php";     ?>
<hr>
<h3 class="text-center"><b>Usuarios</b></h3>
<hr>
<a href="<?php echo $GLOBALS['BASE_URL'] ?>user/admin_createuser" class="btn btn-success btn-lg active m-3 text-light" role="button">Agregar</a>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">User Name</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 0;
    foreach ($users_list as $user) { ?>
      <tr>
        <th scope="row"><?php $num = $num + 1;
                        echo $num  ?></th>
        <td><?php echo  $user['usr_user'] ?></td>
        <td><?php echo  $user['usr_name'] ?></td>
        <td>
          <a href="<?php echo $GLOBALS['BASE_URL'] ?>user/adminedituser/<?php echo $user['usr_id'] ?>" 
          class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Editar</a>
          <?php if ($user['usr_status'] == "1") { ?>
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>user/adminchangestateuser/<?php echo $user['usr_id'] ?>/0" 
            class="btn btn-success btn-sm active" role="button" aria-pressed="true">Bloquear</a>
          <?php } else { ?>
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>user/adminchangestateuser/<?php echo $user['usr_id'] ?>/1" 
            class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Desbloquear</a>
          <?php } ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger btn-sm active" data-toggle="modal" data-target="#exampleModal" 
          onclick="document.getElementById('delete').href='<?php echo $GLOBALS['BASE_URL'] ?>user/admindeleteuser/<?php echo $user['usr_id'] ?>'">
            Eliminar
          </button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>¿Esta seguro que quiere eliminar al proyecto selecionado?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No eliminar</button>
        <a id="delete" class="btn btn-danger" role="button" aria-pressed="true">Eliminar</a>
      </div>
    </div>
  </div>
</div>
