<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>assets/css/buttons.css">
<link rel="icon" href="https://capilezza.com/wp-content/uploads/2021/04/cropped-Logotipo-03-1-32x32.png"
        sizes="32x32">
<link rel="stylesheet" href="<?php echo $GLOBALS['BASE_URL'] ?>assets/css/navbar.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<?php $splitheader = explode('/', $_SERVER['REQUEST_URI']);
$contr = $splitheader[1];  ?>
<nav class="navbar navbar-expand-lg menorca sticky-top">
  <!-- <a class="navbar-brand text-light" href="#">
    <img class="logotipo-verde" src="<?php echo $GLOBALS['BASE_URL'] ?>publico/img/2.png" alt="Logotipo ">
  </a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-bars" aria-hidden="true" style="color:white"></i>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
     <!-- <li class="nav-item">
        <a class=" nav-link text-light <?php if ($contr == 'service') {
                                          echo 'bg-info rounded';
                                        } ?> " href="<?php echo $GLOBALS['BASE_URL'] ?>service/admin_service">Servicios</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link text-light <?php if ($contr == 'claim') {
                                        echo 'bg-info rounded';
                                      } ?> " href="<?php echo $GLOBALS['BASE_URL'] ?>question/admin_claim">Encuestas Realizadas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light <?php if ($contr == 'user') {
                                        echo 'bg-info rounded';
                                      } ?> " href="<?php echo $GLOBALS['BASE_URL'] ?>user/admin_user">Usuarios</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="<?php echo $GLOBALS['BASE_URL'] ?>" class="btn active btn-info mr-3" role="button" aria-pressed="true" style="color: white;" target="_blank"> Pagina Web</a>
      <a href="<?php echo $GLOBALS['BASE_URL'] ?>user/salir" class="btn active btn-danger" role="button" aria-pressed="true" style="color: white;"><i class="fa fa-power-off" aria-hidden="true"></i> SALIR</a>
    </form>
  </div>
</nav>
<script src="<?php echo $GLOBALS['BASE_URL'] ?>direccion.js"></script>