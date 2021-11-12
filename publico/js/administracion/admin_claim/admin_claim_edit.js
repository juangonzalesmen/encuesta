$(document).ready(function() {
    $('#libro').DataTable();
});
$('#statusModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var idstatus = button.data('idstatus')
    var idtype = button.data('idtype')
    var codigo = button.data('code')
    var id = button.data('id')
    var modal = $(this)

    if (idtype == 1) {
        idtypen = 'QUEJA'
    } else {
        idtypen = 'RECLAMO'
    }
    modal.find('.modal-title').text('CAMBIAR ESTADO DE ' + idtypen)
    modal.find('.modal-body #estado').val(idstatus)
    modal.find('.modal-body #codigo').val(codigo)
    modal.find('.modal-body #id').val(id)

})
$('#representanteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var nombre = button.data('nombre')
    var apellidos = button.data('apellidos')
    var telefono = button.data('telefono')
    var correo = button.data('correo')
    var modal = $(this)

    modal.find('.modal-body #dato-nombre').val(nombre)
    modal.find('.modal-body #dato-apellido').val(apellidos)
    modal.find('.modal-body #dato-telefono').val(telefono)
    modal.find('.modal-body #dato-correo').val(correo)
})
$("#form_edit").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: url + "claim/claim_editar",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

        },
        success: function(msg) {
            // console.log(msg)
            location.href = url + "claim/admin_claim";
        }
    });
})