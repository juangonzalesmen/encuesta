<?php require "vistas/admin/admin_config/admin_header.php"; ?>
<hr>
<h3 class="text-center"><b>SERVICIOS</b></h3>
<hr>
<a href="<?php echo $GLOBALS['BASE_URL'] ?>service/createservice" class="btn btn-success btn-lg active m-3 text-light" role="button">Agregar</a>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 0;
    foreach ($service_list as $service) { ?>
      <tr>
        <th scope="row"><?php $num = $num + 1;
                        echo $num  ?></th>
        <td><?php echo  $service['DESCRIPTION'] ?></td>
        <td><?php echo  $service['TYPE'] ?></td>
        <td>
          <a href="<?php echo $GLOBALS['BASE_URL'] ?>service/editservice/<?php echo $service['ID'] ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Editar</a>
          <?php if ($service['STATUS'] == "1") { ?>
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>service/changestateservice/<?php echo $service['ID'] ?>/0" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Bloquear</a>
          <?php } else { ?>
            <a href="<?php echo $GLOBALS['BASE_URL'] ?>service/changestateservice/<?php echo $service['ID'] ?>/1" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Desbloquear</a>
          <?php } ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger btn-sm active" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $service['ID']   ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">¿Esta seguro que quiere eliminar al proyecto seleccionado?</h3>
        <p id="conregistro">El proyecto contiene los siguientes reclamos, asi que no se puede eliminar</p>
        <p id="sinregistro" class="text-center">El alumno no contiene reclamos</p>
        <div class="row w-100" id="carga">
          <div class="spinner-border text-success mx-auto " role="status">
            <span class="sr-only ">Loading...</span>
          </div>
        </div>
        <div class="row w-100">
          <table class="table " id="tabla_registro">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Código</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="row w-100" style="overflow:auto;height: 200px">
          <table class="table">
            <tbody id="registros">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a id="elim" class="btn btn-danger" role="button" aria-pressed="true" disabled>Eliminar</a>
      </div>
    </div>
  </div>
</div>
<script>
  $('#exampleModal').on('show.bs.modal', function(event) {
    $("#conregistro").hide();
    $("#sinregistro").hide();
    $("#tabla_registro").hide();
    $("#carga").show();
    $("#elim").hide();
    $("#registros tr").remove();

    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    $.post(url + "claim/getgsonclaims", {
      ID: recipient
    }, function(data, status) {
      console.log(data);
      var reclamos = JSON.parse(data);

      $("#carga").hide();
      if (reclamos.length > 0) {
        $("#conregistro").show();
        $("#tabla_registro").show();

        $("#registros tr").remove();
        var num = 1;
        reclamos.forEach(reclamo => {
          $("#registros").append('<tr>' +
            '<th scope="row">' + num + '</th>' +
            '<td>' + reclamo['NAME'] + '</td>' +
            '<td>' + reclamo['CLAIMSHEET'] + '</td>' +
            '</tr>')
          num++;
        });
        var heighttable = $("#registros").height();

      } else {
        $("#sinregistro").show();
        $("#elim").show();
      }
    });
    modal.find('#elim ').attr("href", url + "service/deleteservice/" + recipient)
  })
</script>