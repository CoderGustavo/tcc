<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administradores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= url("View/assets/css/adminlte.min.css")?>">
  <link href="<?= url("View/assets/img/favicon1.png")?>" rel="icon">

</head>
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
          <div class="d-flex justify-content-center align-items-center w-100" style="height: 87vh;">
            <form class="form-signin border p-4 shadow rounded w-50" style="border-top: 5px solid #cda45e !important;" method="POST" action="<?= url("admin/cadastrar/admin/cadastrar") ?>">
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
            <h1 class="mb-5 text-center">Cadastrar Administrador</h1>

              <label for="nivelacesso">Nivel de Acesso:</label>
              <select class="custom-select mb-3" id="nivelacesso" name="nivel_acesso">
                <option selected value="4">Garçom</option>
                <option value="3">Chapeiro</option>
                <option value="2">Caixa</option>
                <option value="1">Admin</option>
              </select>

              <label for="inputEmail">Nome:</label>
              <input type="text" name="nome" id="" required="required" class="form-control mb-3" placeholder="Nome" />

              <label for="inputEmail">E-mail:</label>
              <input type="text" name="email" id="" required="required" class="form-control mb-3" placeholder="E-mail" />

              <label for="inputEmail">Telefone:</label>
              <input type="text" name="telefone" id="" required="required" class="form-control mb-3" placeholder="Telefone" />

              <label for="inputPassword">Senha:</label>
              <input type="password" name="senha" id="" required="required" data-msg="Preencha o campo senha" class="form-control mb-3" placeholder="Senha" />  

              <label for="inputPassword">Confirmar Senha:</label>
              <input type="password" name="confirmasenha" id="" required="required" data-msg="Preencha o campo confirmar senha" class="form-control mb-3" placeholder="Confirmar Senha" />  

              <input type="submit" class="btn btn-lg btn-block btn-primarycolor mt-5" value="Cadastrar" />
              
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
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script><script src="<?= url("View/assets/js/mainAdmin.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>