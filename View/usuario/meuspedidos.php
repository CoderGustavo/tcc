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
            <h1>Meus pedidos</h1>
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
          <?php foreach($pedidos as $pedido):?>
            <div class="col-12 p-4 rounded align-items-center mb-3 border border-right-0 border-top-0 border-bottom-0
            <?php
              switch ($pedido->status) {
                case 'Pendente':
                  echo "border-warning";
                break;

                case 'Aguardo':
                  echo "border-warning";
                break;

                case 'Em Preparo':
                  echo "border-primary";
                break;
                
                default:
                echo "border-success";
                break;
              }
            ?>
            " style="background-color: #222; border-width: 8px !important;">
                  <div class="d-flex justify-content-between">
                      <h2 class="text-light">Pedido #<?php echo $pedido->id?></h2>
                      <?php
                        switch ($pedido->status) {
                          case 'Pendente':
                            echo "<p class='h4 text-warning'>$pedido->status </p>";
                          break;
          
                          case 'Aguardo':
                            echo "<p class='h4 text-warning'>$pedido->status </p>";
                          break;
          
                          case 'Em Preparo':
                            echo "<p class='h4 text-primary'>$pedido->status </p>";
                          break;
                          
                          default:
                          echo "<p class='h4 text-success'>$pedido->status </p>";
                          break;
                        }
                      ?>
                  </div>
                  <div class="d-flex justify-content-between pt-5 mt-5 align-items-center">
                      <a href="<?= url("conta/meuspedidos/$pedido->id") ?>" class="btn btn-outline-info btn-lg text-uppercase">Ver Detalhes</a>
                      <p class="h4 text-light">Total: <strong>R$<?php echo $pedido->total?></strong></p>
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
