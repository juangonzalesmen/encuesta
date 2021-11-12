<?php require "vistas/public/header.php";?>
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>publico/fonts/caramello.css" crossorigin>
<style>
    @media (max-width: 750px) {
        .result-div {
            flex-direction: column;

        }

        .elementor-widget-container {
            margin-top: 50px;
        }

        .elementor {
            font-size: 3em;
        }

        .elementor-heading {
            font-size: 1em;
        }

        h6 {
            font-size: 1em;
        }

        .result-hair {
            font-size: 1em;
        }

        .result-product {
            font-size: 1em;
        }

        .result-result {
            font-size: 1em;
        }
    }

    .codigo:hover{
        cursor: pointer;
        background-color: #fddae199 !important;
        color: black !important;
    }

    .parpadea {
    
    animation-name: ;
    animation-duration: 4s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;

    -webkit-animation-name:parpadeo;
    -webkit-animation-duration: 4s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    }

    @-moz-keyframes parpadeo{  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @-webkit-keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }
</style>

<script >history.forward()</script>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>

<body >
    <div class="container-fluid px-1 py-5 mx-auto bod" style="background: #fddae199;">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-11 col-md-11">
                <div class=" card b-0">
                    <div class="form-card">
                        <div class="login-title text-center">
                            <a href="https://capilezza.com"><img class="logotipo-verde"
                                    src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" width="78%"
                                    alt="Logotipo Capilezza"></a>
                        </div>
                        <div class="container">
                            <div class="row result-div">
                                <div class="col card m-2 mt-5">
                                    <h2 class="elementor ">Tu Cabello</h2>
                                    <div class="div-title" style="margin-top:5%">
                                        <h5 class="elementor-heading">RECOMENDACIÓN</h5>
                                        <h5 class="elementor-heading">SOLO TRATAMIENTO</h5>
                                    </div>
                                    <div class="body elementor-hair-body" style="padding-left:25px;">
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
                                        <!-- <?php //foreach ($tip_zero as $tip) {?>
                                        <h6 style="font-weight: 900;">1° TRATAMIENTO:</h6>
                                        <h5 class="result-hair"> <?php //echo $tip["mat_result"]; ?> </h5>
                                        <?php //}?>
                                        <h3 class="lines">-----------------</h3>
                                        <br> -->
                                        <?php foreach ($tip_others as $tip) {?>
                                        <h6 style="font-weight: 900;">TRATAMIENTO:</h6>
                                        <h5 class="result-result"> <?php echo $tip["mat_result"]; ?> </h5>
                                        <?php }?>

                                    </div>
                                </div>

                                <div class="col card m-2 mt-5">
                                    <h2 class="elementor" style="font-size:54px; text-align: center;">Elige tu Marca Aliada</h2>
                                    <div class="div-title" style="margin-top:5%">
                                        <h5 class="elementor-heading">RECOMENDACIÓN</h5>
                                        <h5 class="elementor-heading type">PRODUCTOS </h5>
                                    </div>
                                    <div class="body elementor-type-body" style="padding: 0 5% 0 5%;">
                                        <?php foreach ($tip_others as $tip) {?>
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
                                        <h6> <b> PRODUCTOS: LINEA </b></h6>
                                        <h5 class="result-product"> <ol> <?php $rre = "<b> <li value='1'> </b>" . str_replace('-', " </li> <li>", $tip["mat_product"] . "</li>"); echo $rre;?> </ol></h5>
                                        <div class="col" >
                                            <div style="text-align: -webkit-center;"> 
                                                <div class="codigo" style="padding: 0px !important; margin-bottom: 10px; border-style: solid; border-color: #fddae199; width: 7vw; border-radius: 15%;"> 
                                                    <h6 style="font-size: 1.5vw">Código</h6> 
                                                    <h2 style="font-size: 3vw"> <?php echo $tip["mat_key_code"] ?> </h2> 
                                                </div>
                                                <!-- <a href="https://capilezza.com/tienda/" style="color: black; font-size: 75%; text-align: center;" target="_blank"> <span class="parpadea text" > --- </span> VER MAS <span class="parpadea text"> --- </span></a>  </h5> -->
                                            </div>
                                            <?php }?>
                                            <h6 style="font-size: 1rem;">*Recuerda tu código para realizar la compra</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <br>
                        <h5 style="text-align-last: center;"><a>----</a> Conoce más en <a href="https://capilezza.com"
                                style="color:#fcbdca" target="_blank"> Capilezza.com</a> <a>----</a></h5>
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