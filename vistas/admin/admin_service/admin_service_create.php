<?php require "vistas/admin/admin_config/admin_header.php"; ?>

<form id="form_agregar" method="POST" enctype="multipart/form-data">

    <div class="row w-100">
        <div class=" col-sm shadow p-3 mb-3 bg-white rounded w-100 ml-5 mr-5 mt-2">
            <h3>Datos de Servicio</h3>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo de servicio</label>
                <select class="form-control" name="TYPE">
                <option value="servicio">Servicio</option>
                <option value="producto">Producto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="DESCRIPTION" value="">
            </div>

            
        </div>
    </div>
    <div class="row w-100">
        <div class="   mx-auto ">
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>service/admin_service" class="btn btn-info active m-3 shadow-lg" role="button" aria-pressed="true">Volver</a>
            <input class="btn btn-primary m-3 shadow-lg" type="submit" value="Agregar">
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
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/administracion/admin_service/admin_service_create.js"></script>
<!-- HASTA AQUI-->
