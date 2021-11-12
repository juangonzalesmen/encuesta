<?php require "vistas/admin/admin_config/admin_header.php"; ?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/css/admin_claim.css">

<div id="principal_container">
    <div class="container">
        <div class="title">LIBRO DE RECLAMACIONES <?php echo $data[0]['COMPANYNAME'] ?></div>
        <span class="details"><?php echo $data[0]['RUC'] ?></span>
        <br>
        <span class="details"><?php echo $data[0]['ADDRESS'] ?></span>
        <br>
        <form action="" id="form_agregar" method="POST" enctype="multipart/form-data">
            <input id="date" name="DATE" value="<?php echo $claimone['DATE'] ?>" disabled>
            <h3>DATOS DEL ALUMNO</h3>
            <div class="user-details three">
                <div class="input-box">
                    <span class="details">Nombres</span>
                    <input type="text"   value="<?php echo $claimone['NAME'] ?>" disabled/>
                </div>
                <div class="input-box">
                    <span class="details">Apellido Paterno</span>
                    <input type="text" value="<?php echo $claimone['FLASTNAME'] ?>" disabled/>
                </div>
                <div class="input-box">
                    <span class="details">Apellido Materno</span>
                    <input type="text" value="<?php echo $claimone['MLASTNAME'] ?>" disabled/>
                </div>
            </div>
            <!-- <div class="radio-details">
                <input type="radio" name="GENDER" id="gen-1">
                <input type="radio" name="GENDER" id="gen-2">
                <span class="radio-title">Género</span>
                <div class="category">
                    <label for="gen-1">
                        <span class="dot gen-one"></span>
                        <span class="radio">Masculino</span>
                    </label>
                    <label for="gen-2">
                        <span class="dot gen-two"></span>
                        <span class="radio">Femenino</span>
                    </label>
                </div>
            </div> -->
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Documento</span>
                    <input type="text" value="<?php $doctype=claim_model::getdocTypeById($claimone['IMR_DOCTYPE_ID']);echo $doctype['NAME'] ?>" disabled/>
                    
                </div>
                <div class="input-box">
                    <span class="details">Numero</span>
                    <input type="text" value="<?php echo $claimone['NUMIDENTITY'] ?>" disabled/>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" value="<?php echo $claimone['EMAIL'] ?>" disabled />
                </div>
                <div class="input-box">
                    <span class="details">Telefono</span>
                    <input type="text" value="<?php echo $claimone['PHONE'] ?>" disabled/>
                </div>
                <div class="input-box">
                    <span class="details">Nivel</span>
                    <input type="text" value="<?php echo $claimone['STUDENT_LEVEL'] ?>" disabled/>
                    
                </div>
                <div class="input-box">
                    <span class="details">Grado</span>
                    <input type="text" value="<?php echo $claimone['ACADEMIC_DEGREE'] ?>" disabled/>
                </div>
            </div>
            <!-- <div class="radio-details">
                <input type="radio" name="CLAIMANT" id="age-1" value="mayor" 
                    <?php if($claimone['CLAIMANT']=="mayor"){ echo "checked";}?> disabled>
                <input type="radio" name="CLAIMANT" id="age-2" value="menor" 
                    <?php if($claimone['CLAIMANT']=="menor"){ echo "checked";}?> disabled>
                <span class="radio-title">Edad</span>
                <div class="category">
                    <label for="age-1">
                        <span class="dot age-one"></span>
                        <span class="radio">Adulto</span>
                    </label>
                    <label for="age-2">
                        <span class="dot age-two"></span>
                        <span class="radio">Menor de edad</span>
                    </label>
                </div>
            </div> -->
            
            <div id="domo">
                <h3>PADRE O APODERADO</h3>
                <div class="user-details three">
                    <div class="input-box">
                        <span class="details">Nombres</span>
                        <input type="text" value="<?php echo $claimone['R_NAME'] ?>" disabled class="domo" />
                    </div>
                    <div class="input-box">
                        <span class="details">Apellido Paterno</span>
                        <input type="text" value="<?php echo $claimone['R_FLASTNAME'] ?>" disabled class="domo" />
                    </div>
                    <div class="input-box">
                        <span class="details">Apellido Materno</span>
                        <input type="text" value="<?php echo $claimone['R_MLASTNAME'] ?>" disabled class="domo" />
                    </div>
                </div>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input type="email" value="<?php echo $claimone['R_EMAIL'] ?>" disabled />
                    </div>
                    <div class="input-box">
                        <span class="details">Telefono</span>
                        <input type="text" value="<?php echo $claimone['R_PHONE'] ?>" disabled />
                    </div>
                </div>
            </div>
            <h3>SOBRE EL SERVICIO</h3>
            <div class="radio-details">
                <input type="radio" name="SERVICETYPE" id="sty-1" value="1" 
                <?php if($claimone['SERVICETYPE']=="1"){ echo "checked";}?> disabled>
                <input type="radio" name="SERVICETYPE" id="sty-2" value="0" 
                <?php if($claimone['SERVICETYPE']=="0"){ echo "checked";}?> disabled>
                <span class="radio-title">Tipo de servicio</span>
                <div class="category">
                    <label for="sty-1">
                        <span class="dot sty-one"></span>
                        <span class="radio">Producto</span>
                    </label>
                    <label for="sty-2">
                        <span class="dot sty-two"></span>
                        <span class="radio">Servicio</span>
                    </label>
                </div>
            </div>
            <div class="user-details one">
                <div class="input-box">
                    <span class="details">Documento</span>
                    <input type="text" value="<?php echo $claimone['SERVICETYPE_DESCRIPTION'] ?>" disabled />
                    
                </div>
            </div>
            <h3>SOBRE EL RECLAMO</h3>
            <div class="radio-details">
                <input type="radio" name="CLAIMTYPE" id="cty-1" value="queja" 
                <?php if($claimone['CLAIMTYPE']=="queja"){ echo "checked";}?> disabled>
                <input type="radio" name="CLAIMTYPE" id="cty-2" value="reclamo"
                <?php if($claimone['CLAIMTYPE']=="reclamo"){ echo "checked";}?> disabled>
                <span class="radio-title">Tipo de Reclamo</span>
                <div class="category">
                    <label for="cty-1">
                        <span class="dot cty-one"></span>
                        <span class="radio">Queja</span>
                    </label>
                    <label for="cty-2">
                        <span class="dot cty-two"></span>
                        <span class="radio">Reclamo</span>
                    </label>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Reclamo o Queja</span>
                    <textarea name="CLAIMDESC" cols="30" rows="10" disabled><?php echo $claimone['CLAIMDESC'] ?>
                    </textarea>
                </div>
                <div class="input-box">
                    <span class="details">Pedido al reclamo</span>
                    <textarea name="ORDERCLAIM" cols="30" rows="10" disabled><?php echo $claimone['ORDERCLAIM'] ?>
                    </textarea>
                </div>
            </div>
            <div class="user-details one">
                <div class="input-check">
                    <input type="checkbox" name="titular" checked disabled/>
                    <span class="details" for="titular">Declaro ser el titular</span>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="c_return"  style="position:fixed;top:5em;left:90%">
    <a class="btn btn-light" href="<?php echo $GLOBALS['BASE_URL'] ?>question/admin_claim">
        <span style="color:blue;font-size:40px;">
            <i class="fas fa-backspace" class></i>
        </span>
    </a>
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/claim.js"></script>