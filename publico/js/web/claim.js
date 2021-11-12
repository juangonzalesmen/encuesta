var today;

const prod = document.getElementById("sty-1");
const servi = document.getElementById("sty-2");
const op_productos = document.getElementById("op-productos");
const op_servicios = document.getElementById("op-servicios");
prod.addEventListener("change", (event) => {
    if (event.currentTarget.checked) {
        op_productos.style.display = "block";
        op_servicios.style.display = "none";
    }
});

servi.addEventListener("change", (event) => {
    if (event.currentTarget.checked) {
        op_productos.style.display = "none";
        op_servicios.style.display = "block";
    }
});
const grado = document.getElementById("STUDENT_LEVEL");
const sextoA = document.getElementById("6toB");
const sextoB = document.getElementById("6toA");

const nivel = document.getElementById("ACADEMIC_DEGREE");
grado.addEventListener("change", (event) => {
    console.log("cambio")
    nivel.selectedIndex = 0;
    if (grado.value == "primaria") {
        sextoA.style.display = "block";
        sextoB.style.display = "block";
    } else if (grado.value == "secundaria") {
        sextoA.style.display = "none";
        sextoB.style.display = "none";
    }
});


$("#form_agregar").submit(function(event) {
    event.preventDefault();
    data = new FormData(this)
    data.set('DATE', today)
    Swal.fire({
        icon: "question",
        title: "¿Enviar reclamo?",
        showCancelButton: false,
        confirmButtonText: "Enviar",
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: () => {
            return $.ajax({
                type: "POST",
                url: url + "claim/claim_create",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    console.log(msg);
                    return msg;
                },
                error: function(jqXHR, exception) {
                    var msg = "";
                    if (jqXHR.status === 0) {
                        msg = "Not connect.\n Verify Network.";
                    } else if (jqXHR.status == 404) {
                        msg = "Requested page not found. [404]";
                    } else if (jqXHR.status == 500) {
                        msg = "Internal Server Error [500].";
                    } else if (exception === "parsererror") {
                        msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                        msg = "Time out error.";
                    } else if (exception === "abort") {
                        msg = "Ajax request aborted.";
                    } else {
                        msg = "Uncaught Error.\n" + jqXHR.responseText;
                    }
                    Swal.showValidationMessage(`Request failed: ${msg}`);
                },
            });
        },
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: "success",
                title: `Su reclamo se registró con éxito, el código de su reclamo es ${result.value}. La respuesta del reclamo será enviada a su correo`,
            }).then(() => {
                start();
                location.href = url;
            });
        }
    });
});

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