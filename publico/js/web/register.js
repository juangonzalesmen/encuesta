window.onload = () => {
    var form = document.getElementById('form_agregar_answer');

    function encode_utf8(s) {
        return unescape(encodeURIComponent(s));
    }

    function base64_encode(str) {
        return window.btoa(unescape(encodeURIComponent(str)));
    }

    $("#form_agregar_answer").submit(function(event) {
        event.preventDefault();
        var datos = new FormData(form);

        $cadena = "id=" + datos.get("id_person") + "&null=no";
        $cadena = encode_utf8($cadena);
        $control = "control";
        $cadena = $control + $cadena + $control;
        $cadena = base64_encode($cadena);

        $.ajax({
            type: 'POST',
            url: url + 'question/register_answer_from_form',
            data: datos,
            contentType: false,
            cache: true,
            processData: false,
            dataType: "text",
            beforeSend: function() {
                Swal.fire({
                    title: '¡Cargando!',
                    html: '<h5> Analizando tus respuestas ....</h5> ',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                });
            },
            success: function(email) {
                if (email.status == '1') {

                    Swal.fire({
                        icon: 'success',
                        title: 'Enviamos las respuestas a tu correo.',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.href = url + 'result/results/' + $cadena;

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Revisa tu correo.',
                        showConfirmButton: false,
                        timer: 1000
                    });

                    location.href = url + 'result/results/' + $cadena;
                }
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

    });
}