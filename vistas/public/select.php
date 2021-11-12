<?php ?>
<?php require "vistas/public/header.php";?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap');

label,
h5 {
    font-family: 'Josefin Sans', sans-serif;
    font-weight: 200;
}

option {
    color: black;
    font-family: 'Josefin Sans', sans-serif;
}

input {
    color: black;
}
</style>
<script >history.forward()</script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>

<body >
    <div class="container-fluid px-1 py-5 mx-auto bod" style="background: #fddae199;">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-11 col-md-11">
                <div class="login-title text-center">
                    <a href="https://capilezza.com"><img class="logotipo-verde"
                            src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" width="50%"
                            alt="Logotipo Capilezza"></a>
                </div>
                <br>
                <div class="card b-0">
                    <div class="form-card">
                        <form action="" id="form_agregar_person" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nombre<input type="text" name="per_name" placeholder="Nombre" class=""
                                            required></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Apellido<input type="text" name="per_lastname" placeholder="Apellido"
                                            class="" required></label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Correo<input type="text" name="per_mail" placeholder="Correo" class=""
                                            required></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Celular <br> <input type="text" value="+51" style="width: 60px;" disabled>
                                        <input type="text" name="per_phone" placeholder="Celular" class="phone"
                                            id="per_phone" maxlength="9"
                                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                            style="width: 74%;" required></label>
                                </div>
                            </div>
                            <hr>
                            <h5>Queremos saber de ti</h5>

                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Soy</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="per_sex" id="mujer"
                                            value="Mujer" style="margin-left: -90%;" checked>
                                        <label class="form-check-label" for="mujer">
                                            Mujer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="per_sex" id="hombre"
                                            value="Hombre" style="margin-left: -90%;">
                                        <label class="form-check-label" for="hombre">
                                            Hombre
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Tu edad</legend>
                                <div class="col-sm-10 row">
                                    <div class="form-group col-md-12 row"
                                        style="justify-content: space-between; color: black;">
                                        <select name="per_year" id="edad" style="color:black;">
                                            <option value="menos_18anios">Menos de 18 años</option>
                                            <option value="18_24anios">18 años - 24 años</label></option>
                                            <option value="24_35anios">24 años -35 años</option>
                                            <option value="35_45anios">35 años a 45 años</option>
                                            <option value="45_55anios">45 años - 55 años</option>
                                            <option value="55anios_mas">55 años a mas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="<?php echo $date; ?>" name="date" style="display: none">
                            <button class="a-btn btn-block btn-meno mt-3 mb-1 next" type="submit">SEGUIR CON LA
                                ENCUESTA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

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
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/person_create.js"></script>