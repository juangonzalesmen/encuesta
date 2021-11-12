<?php require "vistas/public/header.php";?>
<script >history.forward()</script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>

<body >
    <div class="container-fluid px-1 py-5 mx-auto bod" style="background: #fddae199;">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-11 col-md-11">
                <div>
                    <a href="<?php echo $GLOBALS['BASE_URL'] ?> " sytle="float:left">
                        <i style="color:#000000c9;font-size:35px;float:left;margin-left:4px"
                            class="fas fa-arrow-circle-left"></i>
                    </a>

                </div>
                <div class="login-title text-center">
                    <a href="https://capilezza.com"><img class="logotipo-verde"
                            src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" width="50%"
                            alt="Logotipo Capilezza"></a>
                </div>
                <p class="desc"><?php echo date("Y/m/d") ?></p>
                <div class="card b-0">
                    <form action="" style="width: 100%;" id="form_agregar_answer" method="POST"
                        enctype="multipart/form-data">
                        <input id="date" name="DATE" value="<?php echo date("Y/m/d") ?>" hidden>

                        <ul id="progressbar" class="text-center">
                            <li class="active step0" id="step1"></li>
                            <li class="step0" id="step2"></li>
                            <li class="step0" id="step3"></li>
                        </ul>

                        <fieldset class="show">
                            <div class="form-card">
                                <h5 class="sub-heading">Encuesta</h5>
                                <?php foreach($question as $query ){ 
                                if($query["qus_id"] >=0 && $query["qus_id"] <= 4 ){?>
                                <div class="form-row">
                                    <label class="form-control-label">
                                        <?php echo $query["qus_id"].". ".$query["qus_description"]; ?>
                                    </label>
                                    <div class="form-group col-md-10 row">
                                        <select class="select_question" name="<?php echo $query["qus_id"] ?>" id="edad">
                                            <?php foreach(answer_model::get_answer_to_form($query["qus_id"]) as $respond){ ?>
                                            <option value="<?php echo $respond["ans_id"] ?>">
                                                <?php echo $respond["ans_description"] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php }}?>

                                <button type="button" id="next1" onclick="validate1(0)"
                                    class="btn-block btn-meno mt-3 mb-1 next">
                                    SIGUIENTE <span class="fa fa-long-arrow-right"></span></button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <?php  foreach($question as $query ){ 
                                if($query["qus_id"] >=5 && $query["qus_id"] <= 8 ){?>
                                <div class="form-row">
                                    <label class="form-control-label">
                                        <?php echo $query["qus_id"].". ".$query["qus_description"]; ?>
                                    </label>
                                    <div class="form-group col-md-10 row">
                                        <select class="select_question" name="<?php echo $query["qus_id"] ?>" id="edad">
                                            <?php foreach(answer_model::get_answer_to_form($query["qus_id"]) as $respond){ ?>
                                            <option value="<?php echo $respond["ans_id"] ?>">
                                                <?php echo $respond["ans_description"] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php }}?>

                                <button type="button" id="next2" class="btn-block btn-meno mt-3 mb-1 next mt-4"
                                    onclick="validate2(0)">SIGUIENTE<span
                                        class="fa fa-long-arrow-right"></span></button>
                                <button type="button" class="btn-block btn-secondary mt-3 mb-1 prev"><span
                                        class="fa fa-long-arrow-left"></span>ANTERIOR</button>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <?php  foreach($question as $query ){ 
                                    if($query["qus_id"] >=9 && $query["qus_id"] <= 12 ){?>
                                <div class="form-row">
                                    <label class="form-control-label">
                                        <?php echo $query["qus_id"].". ".$query["qus_description"]; ?>
                                    </label>
                                    <div class="form-group col-md-10 row">
                                        <select class="select_question" name="<?php echo $query["qus_id"] ?>" id="edad">
                                            <?php foreach(answer_model::get_answer_to_form($query["qus_id"]) as $respond){ ?>
                                            <option value="<?php echo $respond["ans_id"] ?>">
                                                <?php echo $respond["ans_description"] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <?php }}?>
                                <input type="text" value="<?php echo $id_person; ?>" name="id_person"
                                    style="display: none">

                                <button id="next3" class="btn-block btn-meno mt-3 mb-1 next mt-4"
                                    onclick="validate3(0)">ENVIAR RESPUESTAS<span
                                        class="fa fa-long-arrow-right"></span></button>
                                <button type="button" class="btn-block btn-secondary mt-3 mb-1 ant"><span
                                        class="fa fa-long-arrow-left"></span>ANTERIOR</button>
                            </div>
                        </fieldset>
                    </form>
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
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/register.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/claim_steps.js"></script>