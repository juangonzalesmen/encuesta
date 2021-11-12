
<?php require "vistas/admin/admin_config/admin_header.php";     ?>


<form id="form_agregar" method="POST" enctype="multipart/form-data">

    <div class="row w-100">
        <div class=" col-sm shadow p-3 mb-3 bg-white rounded w-100 ml-5 mr-5 mt-2">
            <h3>Datos de Usuario</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="hidden" class="form-control" name="ID" value="<?php echo $user['usr_id']?>">
                <input type="text" class="form-control" name="USER" value="<?php echo $user['usr_user']?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="PASSWORD" value="<?php echo $user['usr_password']?>">
            </div>

            
        </div>
    </div>
    <div class="row w-100">
        <div class="   mx-auto ">
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>user/admin_user" class="btn btn-info active m-3 shadow-lg" role="button" aria-pressed="true">Volver</a>
            <input class="btn btn-primary m-3 shadow-lg" type="submit" value="Editar">
        </div>

    </div>
</form>
<div class="modal fade " id="modalcarga" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center">Ejecutando</p>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/administracion/admin_user/admin_user_edit.js"></script>
<!-- HASTA AQUI-->
