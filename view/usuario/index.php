<?php
  require_once'../../model/Usuario.php';
  session_start();
  $usuario = 0;
  $usuario = $_SESSION['usuario'];
  if ($usuario != 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Minha conta</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link href="../../assets/img/favicon1.png" rel="icon">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
    include("layout/navbarCliente.php");
  ?>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    include("layout/sidebarCliente.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 text-center">
            <h1>Meus dados</h1>
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

            <?php
              if (isset($_SESSION["erro"])) {
            ?>
              <div class="bg-danger w-100 p-3 mt-2 text-center"><?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?></div>
            <?php } ?>

            <form class="form-signin1" method="POST" action="../usuario-atualizar.php">

              <label for="inputEmail" >Nome</label> 
              
              <p><?php echo $usuario['nome']?></p>

              <label for="inputEmail" >E-mail</label>
              <input type="text" name="email" id="email" required="required" value= "<?php echo $usuario['email']?>" class="form-control mb-3"  />

              <label for="inputEmail" >Telefone</label>
              <input type="text" name="telefone" id="telefone" required="required" value= "<?php echo $usuario['telefone']?>" class="form-control mb-3" />

              <label for="inputPassword" >Confirmar Senha</label>
              <input type="password" name="confirmarsenha" id="confirmarsenha" required="required" data-msg="Preencha o campo confirmar senha" class="form-control mb-3" />  

              <input type="submit" class="btn btn-lg btn-success btn-block mt-5" value="Salvar" />
              
            </form>    
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
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
</body>
</html>
<?php } else { $_SESSION["acesso_restrito"] = "Não logado";header('Location: /tcc'); } ?>
