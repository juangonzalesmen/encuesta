$("#form_agregar").submit(function(event) {
    event.preventDefault();
    data = new FormData(this)
    data.set('DATE', today)
    data.set('JOB', document.getElementById("job").value)
    Swal.fire({
        icon: 'question',
        title: '¿Enviar datos?',
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            return $.ajax({
                type: 'POST',
                url: url + "claim/claim_create",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    return msg
                        //document.getElementById("form_agregar").reset();
                    start();
                    //location.href = url;
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    Swal.showValidationMessage(
                        `Request failed: ${msg}`
                    )
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: `Su reclamo se registró con éxito, el código de su reclamo es ${result.value}`,
            })
        }
    })
})

start();

function start() {
    Date.prototype.toDateInputValue = (function() {
        local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    today = new Date().toDateInputValue();
    document.getElementById('date').value = today;
}