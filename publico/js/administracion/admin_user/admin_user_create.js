$("#form_agregar").submit(function(event) {
    event.preventDefault();
    $("#modalcarga").modal({ backdrop: 'static', show: true });
    $.ajax({
        type: 'POST',
        url: url + "user/admincreateuseragree",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {},
        success: function(msg) {
            location.href = url + "user/admin_user";
        }
    });
})