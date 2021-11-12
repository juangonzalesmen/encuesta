<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-32x32.png"
        sizes="32x32">
    
    <title>Login Capilezza</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>assets/css/login.css">

    <!-- Favicon and touch icons -->

</head>

<body>
    <div class="container ">
        <div class="row">
            <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="login-title text-center">
                    <img class="logotipo-verde" src="https://capilezza.com/wp-content/uploads/2021/04/Capilleza2.svg" alt="Logotipo marcelinochampagnat">
                </div>
                <div class="login-content">
                    <div class="login-header text-center">
                        <h3><strong>BIENVENIDO</strong></h3>
                        <h5>INGRESE SU USUARIO Y CONTRASEÑA </h5>
                    </div>
                    <div class="login-body">
                        <form action="<?php echo $GLOBALS['BASE_URL'] ?>user/enter" method="POST">
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="form-username" type="text" name="form-username" placeholder="Usuario..." class="form-username form-control form-input">
                                    <i class="fa fa-user"></i>
                                    <span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="form-password" type="password" name="form-password" placeholder="Contraseña..." class="form-password form-control form-input">
                                    <i class="fa fa-lock"></i>
                                    <span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-warning form-control"><strong>Sign in</strong></button>
                            </div>

                        </form>
                    </div> <!-- end  login-body -->
                    <div class="alert" role="alert" style="display: <?php echo ($valor == "1") ? "none" : "block"; ?>;">
                        Usuario/Contraseña incorrecto.
                    </div>
                </div><!-- end  login-content -->
            </div> <!-- end  login-container -->

        </div>
    </div><!-- end container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>