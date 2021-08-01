<?php
  session_start();
  error_reporting(0);
  session_start();
$logado = $_SESSION['usuario_logado'];
if ($logado == 1) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
  .taman{
  width:27px;
  height: 27px;
}
  .teste{
  margin-top: 10px;
  margin-left: 3px;
}

</style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administradores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="../../assets/img/favicon1.png" rel="icon">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    include("layout/navbar.php");
  ?>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    include("layout/sidebar.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>Cadastre um Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="offset-md-4 col-md-4">
            <!-- /.card -->
          <form class="form-signin1" method="POST" action="../usuario-salvar.php">

          <label for="inputEmail" class="sr-only">Nome</label>
          <input type="text" name="nome" id="" required="required" class="form-control mb-3" placeholder="Nome" />

          <label for="inputEmail" class="sr-only">E-mail</label>
          <input type="text" name="endereco" id="" required="required" class="form-control mb-3" placeholder="Endereço" />

          <label for="inputEmail" class="sr-only">Telefone</label>
          <input type="text" name="telefone" id="" required="required" class="form-control mb-3" placeholder="Telefone" />

          <label for="inputEmail" class="sr-only">Endereço</label>
          <input type="email" name="email" id="" required="required" class="form-control mb-3" placeholder="E-mail" />

          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="senha" id="" required="required" data-msg="Preencha o campo senha" class="form-control mb-3" placeholder="Senha" />  

          <label for="inputPassword" class="sr-only">Confirmar Senha</label>
          <input type="password" name="confirmarsenha" id="" required="required" data-msg="Preencha o campo confirmar senha" class="form-control mb-3" placeholder="Confirmar Senha" />  

          <input type="submit" class="btn btn-lg btn-success btn-block mt-5" value="Cadastrar" />
          
          
          
        </form>     
        <?php
          if (isset($_SESSION["erro"])) {
            
          
        ?>
        <div class="bg-danger w-100 p-3 mt-2 text-center"><?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?></div>
          <?php } ?>
          </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control mb-3-sidebar control mb-3-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control mb-3-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php } else { header('Location: ../usuario-nao-logado.php'); } ?>
