<?php require "vistas/public/header.php";?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/error.css">
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/fonts/caramello.css" crossorigin>
<script >history.forward()</script>

<?php 
 $email= " info@cudesi.com.pe";
 $cc = "gmalca@cudesi.com.pe";
 $subject = "Error en encuesta capilezza";
 $body = "'Ocurrio un error durante la ejecucion de la encuesta, codigo de error: $error '";

 $all = "mailto: $email?cc=$cc&subject=$subject&body=$body";
?>
<div class="container-fluid px-1 py-5 mx-auto bod" style="background: #fddae199;">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-11 col-md-11">
            <div class=" card b-0">
                <div class="form-card">
                    <div class="login-title text-center">
                        <a href="https://capilezza.com"><img class="logotipo-verde"
                            src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" width="50%"
                            alt="Logotipo Capilezza"></a>
                    </div>
                    <div class="container">
                        <div id="notfound">
                            <div class="notfound">
                                <div>
                                    <div class="notfound-404">
                                        <h1>!</h1>
                                    </div>
                                    <h2>Error</h2>
                                    <br>
                                    <p>Es posible que durante la ejecución de la encuesta haya ocurrido un error.
                                        <a href="<?php echo $all; ?>" title="Reporte de error">Reportar el error</a> ó <a href="<?php echo  $GLOBALS['BASE_URL'] ?>">Empezar de nuevo</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>