<?php require "vistas/admin/admin_config/admin_header.php"; ?>
<style>
    #libro_filter {
        margin-left: 50%;
    }
</style>

<body>

    <section class="m-5 pl-2 pr-2">
        <hr>
        <div class="container">
  <div class="row">
    <div class="col-sm">
    <button type="button" class="btn btn-primary " onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>question/admin_download';"  >Descargar Reporte</button>

    </div>
    <div class="col-sm">
    <h3 class="text-center" ><b>Lista de Encuestas </b></h3>
    </div>
    <div class="col-sm">
    &nbsp;
    </div>
  </div>
</div>
       
        
        

   
    
   
        

        <hr>
        <table id="libro" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Resultado</th>
                   
                  <!--  <th scope="col">RECLAMANTE</th>
                    <th scope="col">TIPO PERSONA</th>
                    <th scope="col">TIPO SERVICIO</th>
                    <th scope="col">SERVICIO</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">ACCIONES</th>
                    !-->
                </tr>
            </thead>
            <tbody>
                <?php $num = 0;
                foreach ($listclaim as $claim) : ?>
                    <tr>
                        <th scope="row"><?php $num = $num + 1;
                                        echo $num  ?></th>
                        <td><?php echo $claim['per_name'] ?> <?php echo $claim['per_lastname'] ?></td>
                        <td><?php echo $claim['per_mail'] ?></td>

                        <td><?php echo $claim['afr_date_register'] ?></td>
                        <td>
                            <a href="<?php echo $GLOBALS['BASE_URL'] ?>question/claim_ver/<?php echo $claim['per_id']; ?>" class="btn btn-success btn-sm active" role="button" aria-pressed="true"><i class="fa fa-eye"></i> Ver</a>
                        </td>
                        
                        

                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Modal Status -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_edit" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="codigo">Codigo de documento</label>
                        <input id="codigo" class="form-control codigo" type="text" readonly>
                        <br>
                        <label for="codigo">Estado Actual</label>
                        <input id="estado" class="form-control estado" type="text" value="" readonly>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Selecciones un estado</label>
                            <select class="form-control" id="status" name="IDCLAINSTATUS">
                                <?php foreach ($liststatus as $status) { ?>
                                    <option value="<?php echo $status["ID"] ?>"><?php echo $status["NAME"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="ID" class="form-control" id="id" type="text" value="" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input class="btn btn-primary m-3 shadow-lg" type="submit" value="Actualizar">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal Status -->
    <div class="modal fade" id="representanteModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Representante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_edit" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="email" id="dato-nombre" class="form-control" id="inputEmail3" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="email" id="dato-apellido" class="form-control" id="inputEmail3" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nro teléfono</label>
                            <div class="col-sm-10">
                                <input type="email" id="dato-telefono"class="form-control" id="inputEmail3" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Correo electrónico</label>
                            <div class="col-sm-10">
                                <input type="email" id="dato-correo"class="form-control" id="inputEmail3" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/administracion/admin_claim/admin_claim_edit.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/administracion/admin_claim/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>