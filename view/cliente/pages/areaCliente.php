<?php
require_once'../../admin/classe/Usuario.php';
  session_start();
$logado = $_SESSION['usuario_logado'];
$usuario = new Usuario();
$usu = $usuario->ListarClienteLogado($_SESSION['id_usuario'] );
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
  <title>Minha conta</title>

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
            <!-- /.card -->
            <?php foreach($usu as $linha):?>
           
           
          <form class="form-signin1" method="POST" action="../usuario-atualizar.php">

          <label for="inputEmail" >Nome</label> 
          
          <p><?php echo$linha['nome']?></p>

          <label for="inputEmail" >E-mail</label>
          <input type="text" name="email" id="email" required="required" value= "<?php echo $linha['email']?>" class="form-control mb-3"  />

          <label for="inputEmail" >Telefone</label>
          <input type="text" name="telefone" id="telefone" required="required" value= "<?php echo $linha['telefone']?>" class="form-control mb-3" />

          <label for="inputEmail" >Endereço</label>
          <input type="text" name="endereco" id="endereco" required="required" value= "<?php echo $linha['endereco']?>" class="form-control mb-3"  />
           

          <label for="inputPassword" >Confirmar Senha</label>
          <input type="password" name="confirmarsenha" id="confirmarsenha" required="required" data-msg="Preencha o campo confirmar senha" class="form-control mb-3" />  

          <input type="submit" class="btn btn-lg btn-success btn-block mt-5" value="Salvar" />
          
         <?php endforeach; ?>
          
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
