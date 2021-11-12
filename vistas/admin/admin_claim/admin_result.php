<?php require "vistas/public/header.php";?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/fonts/caramello.css" crossorigin>
<style>
@media (max-width: 750px) {
    .result-div{
        flex-direction: column;
      
    }
    .elementor-widget-container{
        margin-top:50px;
    }
    .elementor{
        font-size:3em;
    }
    .elementor-heading{
        font-size:1em;
    }
    h6{
        font-size:1em;
    }
    .result-hair{font-size:0.8em;}
    .result-product{font-size:0.8em;}
    .result-result{font-size:0.8em;}
}
</style>
<div class="container-fluid px-1 py-5 mx-auto" style="background: #fddae199;">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-11 col-md-11">
            <div class=" card b-0">
                <div class="form-card">
                    <div>
                    <button type="button" class="btn btn-link btn-lg" onclick="location.href='<?php echo $GLOBALS['BASE_URL'] ?>question/admin_claim';"  style="color:pink">Volver</button>

                    </div>
                    <div class="login-title text-center">
                        <img class="logotipo-verde"
                            src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" width="50%"
                            alt="Logotipo Capilezza">
                    </div>
                    <div class="container">
                        <div class="row result-div">
                            <div class="col card m-2 mt-5">
                                <div class="div-title">
                                    <h2 class="elementor ">Tu cabello </h2>
                                    <h5 class="elementor-heading">RECOMENDACIÓN</h5>
                                    <h5 class="elementor-heading">SOLO TRATAMIENTO</h5>
                                </div>
                                <div class="body elementor-hair-body">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image-box-wrapper">
                                            <h3 class="lines">-----------------</h3>
                                            <figure class="elementor-image-box-img"><a href="#"><img width="40"
                                                        height="40"
                                                        src="https://capilezza.com/wp-content/uploads/2020/04/icon6.png"
                                                        class="attachment-full size-full" alt="" loading="lazy"
                                                        srcset="https://capilezza.com/wp-content/uploads/2020/04/icon6.png 110w, https://capilezza.com/wp-content/uploads/2020/04/icon6-100x100.png 100w"
                                                        sizes="(max-width: 110px) 100vw, 110px"></a></figure>
                                            <div class="elementor-image-box-content"></div>
                                        </div>
                                    </div>
                                    <?php foreach($tip_zero as $tip){ ?>
                                    <h6>TRATAMIENTO</h6>
                                    <h5 class="result-hair"> <?php echo $tip["mat_result"]; ?> </h5>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col card m-2 mt-5">
                                <div class="div-title">
                                    <h2 class="elementor">Elige tu tipo </h2>
                                    <h5 class="elementor-heading">RECOMENDACIÓN</h5>
                                    <h5 class="elementor-heading type">TRATAMIENTO + PRODUCTOS </h5>
                                </div>
                                <div class="body elementor-type-body">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image-box-wrapper">
                                            <h3 class="lines">-----------------</h3>
                                            <figure class="elementor-image-box-img"><a href="#"><img width="40"
                                                        height="40"
                                                        src="https://capilezza.com/wp-content/uploads/2020/04/icon6.png"
                                                        class="attachment-full size-full" alt="" loading="lazy"
                                                        srcset="https://capilezza.com/wp-content/uploads/2020/04/icon6.png 110w, https://capilezza.com/wp-content/uploads/2020/04/icon6-100x100.png 100w"
                                                        sizes="(max-width: 110px) 100vw, 110px"></a></figure>
                                            <div class="elementor-image-box-content"></div>
                                        </div>
                                    </div>
                                    <?php foreach($tip_others as $tip){ ?>
                                    <h6>TRATAMIENTO</h6>
                                    <h5 class="result-result"> <?php echo $tip["mat_result"]; ?> </h5>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image-box-wrapper">
                                            <h3 class="lines">-----------------</h3>
                                            <figure class="elementor-image-box-img"><a href="#"><img width="40"
                                                        height="40"
                                                        src="https://capilezza.com/wp-content/uploads/2020/04/icon5.png"
                                                        class="attachment-full size-full" alt="" loading="lazy"
                                                        srcset="https://capilezza.com/wp-content/uploads/2020/04/icon5.png 110w, https://capilezza.com/wp-content/uploads/2020/04/icon5-100x100.png 100w"
                                                        sizes="(max-width: 110px) 100vw, 110px"></a></figure>
                                            <div class="elementor-image-box-content"></div>
                                        </div>
                                    </div>
                                    <h6>PRODUCTOS</h6>
                                    <h5 class="result-product">
                                        <?php $rre = str_replace('-', "</br>", $tip["mat_product"]); echo $rre;?> </h5>
                                    <?php } ?>
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
<script>

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>publico/js/web/person_create.js"></script>