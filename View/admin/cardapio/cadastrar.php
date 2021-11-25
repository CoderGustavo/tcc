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
            <form class="form-signin border p-4 shadow rounded" style="border-top: 5px solid #cda45e !important;" method="POST" enctype="multipart/form-data" action="<?= url("admin/cadastrar/cardapio/cadastrar") ?>">
              
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
              
              <h1 class="mb-5">Cadastrar Item</h1>
              <label for="inputEmail">Nome:</label>
              <input type="text" name="nome" id="inputEmail" required="required" class="form-control mb-3 border-0 shadow" placeholder="Ex: X-Tudo" />

              <label for="inputPreco">Preço:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text border-0 shadow">R$</span>
                </div>
                <input type="text" name="preco" id="inputPreco" required="required" class="form-control border-0 shadow" placeholder="Ex: 1.99" />
              </div>

              <div class="mb-3">
              <label for="inputCategoria">Categoria:</label>
              <select class="custom-select border-0 shadow" id="inputCategoria" name="categoria">
                <?php if($categorias): foreach($categorias as $key => $categoria): ?>
                <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nome ?></option>
                <?php endforeach; endif; ?>
              </select>
              </div>
              
              <label for="inputImagem">Imagem:</label>
                <div class="custom-file shadow border-0 mb-3 rounded">
                  <input type="file" name="imagem" class="custom-file-inpu border-0" id="inputImagem">
                  <label class="custom-file-label border-0" for="inputImagem">Escolher Arquivo</label>
                </div>
              <div class="row">
                <?php if($ingredientes): foreach ($ingredientes as $key => $ingrediente):?>
                  <div class="col-md-6 p-2">
                    <label for="check<?php echo $ingrediente->nome?>" class="w-100 p-2 rounded shadow" style="cursor: pointer;">
                      <input type="checkbox" style="cursor: pointer;" name="ingredientes[<?php echo $key?>]" id="check<?php echo $ingrediente->nome?>" value="<?php echo $ingrediente->id?>" <?php if($ingrediente->retirar == "nao"){echo "checked";}?>>
                      <span class="ml-3">
                        <?php echo $ingrediente->nome?>
                      </span>
                    </label>
                  </div>
                <?php endforeach; endif; ?>
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