
$("#form_agregar").submit(function(event) {
    event.preventDefault();
    $("#modalcarga").modal({ backdrop: 'static', show: true });
    $.ajax({
        type: 'POST',
        url: url + "service/createserviceagree",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(msg) {
            console.log(msg);
            location.href = url + "service/admin_service";
        }
    });
})