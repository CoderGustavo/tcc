<!DOCTYPE html>
<html lang="en">
<?php include_once("View/admin/layout/header.php")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    include("View/admin/layout/navbar.php");
    include("View/admin/layout/sidebar.php");
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="d-flex justify-content-center align-items-center w-100" style="height: 100vh;">
            <form class="form-signin border p-4 shadow rounded" style="border-top: 5px solid #cda45e !important;" method="POST" action="<?= url("admin/cadastrar/ingrediente/cadastrar") ?>">
              
              <?php if (isset($_SESSION["erro"])):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php elseif(isset($_SESSION["sucesso"])):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo $_SESSION["sucesso"]; unset($_SESSION["sucesso"]); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif?>  
              
              <h1 class="mb-5">Cadastrar Ingrediente</h1>
              <label for="inputNome">Nome:</label>
              <input type="text" name="nome" id="inputNome" required="required" class="form-control mb-3 border-0 shadow" placeholder="Ex: Pão de hamburguer" />
              <div class="row">
                <div class="col-md-6 p-2">
                  <label for="checkRetirar" class="w-100 p-2 rounded shadow" style="cursor: pointer;">
                    <input type="radio" style="cursor: pointer;" name="retirar" id="checkRetirar" value="sim" checked>
                    <span class="ml-3">
                      Pode retirar
                    </span>
                  </label>
                </div>
                <div class="col-md-6 p-2">
                  <label for="checknaoRetirar" class="w-100 p-2 rounded shadow" style="cursor: pointer;">
                    <input type="radio" style="cursor: pointer;" name="retirar" id="checknaoRetirar" value="nao">
                    <span class="ml-3">
                      Não pode retirar
                    </span>
                  </label>
                </div>
                <div class="slider-checkbox">
                  <input type="checkbox" name="ponto" value="sim"/>
                  <label class="label">Possui ponto?</label>
                </div>
              </div>
              <input type="submit" class="btn btn-lg btn-block btn-primarycolor mt-5" value="Cadastrar" />
            </form>     
          </div>
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control mb-3-sidebar control mb-3-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control mb-3-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script><script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>