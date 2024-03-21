<html lang="en">
<?php include_once("View/admin/layout/header.php")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
    include("modalAtualizarPedido.php");
    include("View/admin/layout/navbar.php");
    include("View/admin/layout/sidebar.php");
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todos os pedidos <?php echo $status ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php url("admin") ?>">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Todos os pedidos <?php echo $status ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Todos os pedidos <?php echo $status ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Forma de Pagamento</th>
                      <th>Total</th>
                      <th>Entrega?</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($pedidos): foreach ($pedidos as $linha): ?>
                    <tr>
                      <td><?php echo $linha->id ?></td>
                      <td><?php echo $linha->nome ?></td>
                      <td><?php echo $linha->forma_pagamento ?></td>
                      <td>R$<?php echo $linha->total ?></td>
                      <td><?php echo $linha->entrega ?></td>
                      <?php if($linha->status == 'Pendente'){?>
                        <td>
                          <span class="badge badge-pill bg-warning p-2"> <?php echo $linha->status ?> </span>
                        </td>
                      <?php }else if($linha->status == 'Aguardo'){?>
                        <td>
                          <span class="badge badge-pill bg-primarycolor p-2"> <?php echo $linha->status ?> </span>
                        </td>
                      <?php }else if($linha->status == 'Em Preparo'){?>
                        <td>
                          <span class="badge badge-pill bg-primary p-2"> <?php echo $linha->status ?> </span>
                        </td>
                      <?php }else if($linha->status == 'Entregue'){?>
                        <td>
                          <span class="badge badge-pill bg-success p-2"> <?php echo $linha->status ?> </span>
                        </td>
                      <?php }else{?>
                        <td>
                          <span class="badge badge-pill bg-danger p-2"> <?php echo $linha->status ?> </span>
                        </td>
                      <?php }?>
                      <td>
                        <a href="<?= url("admin/pedido/informacoes/$linha->id") ?>"><i class="far fa-info text-info rounded-pill p-2"></i></a>
                        <?php switch ($linha->status):
                          case 'Cancelado': ?>
                          
                          <?php break; case 'entregue': ?>
                          <?php break; default: ?>
                            <a href="#" data-toggle="modal" data-target="#atualizarPedido<?php echo $linha->id ?>"><i class="far fa-sync text-success rounded-pill p-2"></i></a>
                          <?php break; ?>
                        <?php endswitch; ?>
                      </td>
                      </tr>
                    <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
