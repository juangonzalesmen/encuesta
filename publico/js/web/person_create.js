window.onload = () => {

    var form = document.getElementById('form_agregar_person');

    function encode_utf8(s) {
        return unescape(encodeURIComponent(s));
    }

    function base64_encode(str) {
        return window.btoa(unescape(encodeURIComponent(str)));
    }

    function enconding($cadena) {
        $cadena = encode_utf8($cadena);
        $control = "control";
        $cadenas = $control + $cadena + $control;
        $cadenas = base64_encode($cadenas);
        return $cadenas;
    }

    $("#form_agregar_person").submit(function(event) {
        event.preventDefault();
        var datos = new FormData(form);

        if (datos.get("per_sex") == "Hombre") {
            var mensaje = "Queremos asegurarnos de que no tienes ningún gemelo malvado. <br> <strong> Tu eres único para nosotros</strong> <br>";
        } else if (datos.get("per_sex") == "Mujer") {
            var mensaje = "Queremos asegurarnos de que no tienes ninguna gemela malvada. <br> <strong> Tu eres única para nosotras</strong> <br>";
        }

        Swal.fire({
            imageUrl: 'https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg',
            imageHeight: 40,
            imageAlt: 'Capilezza',
            html: '<br>' +
                'Queremos registrar tus datos para brindarte un mejor servicio.' +
                '<br>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up fa-xs"></i>',
            confirmButtonAriaLabel: 'Aceptar!',
            cancelButtonText: '<i class="fa fa-thumbs-down fa-xs"></i>',
            cancelButtonAriaLabel: 'Cancelar',
            allowOutsideClick: false,
            preConfirm: () => {
                $.ajax({
                    type: 'POST',
                    url: url + 'question/person_create',
                    data: datos,
                    contentType: false,
                    cache: true,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        Swal.fire({
                            html: mensaje,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading()
                            },
                        });
                    },
                    success: function(data) {
                        if (data.accion == 'C') {
                            $id = enconding("id=" + data.datos + "&accion=creada");
                            location.href = url + 'question/question/' + $id;
                        } else if (data.accion == 'E') {
                            $id = enconding("id=" + data.datos + "&accion=encontrada");
                            response_user($id, datos);
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
            },


        });

    });

    function response_user($id, data) {
        $cadena = enconding("id=" + $id + "&accion=update");
        Swal.fire({
            imageUrl: 'https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg',
            imageHeight: 40,
            imageAlt: 'Capilezza',
            html: '<br>' +
                'Encontramos registros con los datos que ingresaste.' +
                '<br>' +
                '<strong> Elige una opción.</strong>',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonColor: '#fddae1',
            confirmButtonText: '<p style="margin-bottom: 0 !important; font-size: 1.5vh; color:black;"> Continuar con estos datos </p>',
            confirmButtonAriaLabel: 'Aceptar!',
            cancelButtonText: '<p style="margin-bottom: 0 !important; font-size: 1.5vh;"> Ver mi resultado anterior. </p>',
            cancelButtonAriaLabel: 'Cancelar',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url + 'question/person_update',
                    data: data,
                    contentType: false,
                    cache: true,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        Swal.fire({
                            html: '<h5> Cargando encuesta...</h5>',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading()
                            },
                        });
                    },
                    success: function(data) {
                        if (data.accion == 'C') {
                            $id = enconding("id=" + data.datos + "&accion=creada");
                            location.href = url + 'question/question/' + $id;
                        }
                    },
                    // success: function(data_result) {
                    //     location.href = url + 'question/question/' + $cadena;
                    // }
                })

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                location.href = url + 'question/result_stored/' + $id;
            }
        });

    }
}