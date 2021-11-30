<!DOCTYPE html>
<html lang="en">
<?php include_once("layout/header.php")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    include("View/usuario/layout/navbar.php");
    include("View/usuario/layout/sidebar.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>Minhas Reservas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="container">
          <?php if (isset($_SESSION["erro"])):?>
            <div class="alert alert-danger alert-dismissible fade show autohide" role="alert"><h5 class="m-0"><i class="fas fa-ban mr-3"></i>
              <?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?></h5>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php elseif(isset($_SESSION["sucesso"])):?>
            <div class="alert alert-success alert-dismissible fade show autohide" role="alert"><h5 class="m-0"><i class="fas fa-check mr-3"></i>
              <?php echo $_SESSION["sucesso"]; unset($_SESSION["sucesso"]); ?></h5>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif?>
        </div>
        <div class="row p-3">
          <?php foreach($reservas as $reserva):?>
            <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0
            <?php
            if($reserva->status == "Livre"){
                echo "border-success";
            }else if($reserva->status == "Utilizada"){
              echo "border-danger";
            }else{
              echo "border-primary";
            }
            
            ?>
            " style="background-color: #222; border-width: 8px !important;">
                  <div class="d-flex justify-content-between">
                      <h2 class="text-light">Mesa reservada #<?php echo $reserva->id?></h2>
                      <?php if($reserva->status == "Livre"){?>
                          <p class="h4 text-success"><?php echo $reserva->status?></p>
                      <?php }else if($reserva->status == "Utilizada"){?>
                          <p class="h4 text-danger">Sendo <?php echo $reserva->status?></p>
                      <?php } else{?>
                          <p class="h4 text-primary"><?php echo $reserva->status?></p>
                      <?php } ?>
                  </div>
                  <div class="d-flex justify-content-between pt-5 mt-5 align-items-center">
                      <div>
                        <p class="m-0 text-light">Qtd. Pessoas: <?php echo $reserva->numero_pessoas ?></p>
                        <p class="m-0 text-light">Data: <?php echo explode(" ",$reserva->datahora)[0]; ?></p>
                        <p class="m-0 text-light">Horario: <?php echo explode(" ",$reserva->datahora)[1]; ?></p>
                      </div>
                      <p class="h4 text-light">Total gasto: <strong>R$<?php echo $reserva->total?></strong></p>
                  </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script>

<script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>

</body>
</html>
