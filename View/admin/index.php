<!DOCTYPE html>
<html lang="en">
<?php include_once("layout/header.php")?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
      include_once("layout/navbar.php");
      include_once("layout/sidebar.php");
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informações gerais</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box border border-3 border-success text-success shadow">
              <div class="inner">
                <h3><?php echo $qtdPedidos?></h3>

                <p>Total Pedidos</p>
              </div>
              <div class="icon">
                <i class="far fa-shopping-bag text-success"></i>
              </div>
              <a href="<?= url("admin/listar/pedidos") ?>" class="small-box-footer bg-success">Ver Todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box border border-3 border-warning text-warning shadow">
              <div class="inner">
                <h3><?php echo $qtdPedidosPendentes ?></h3>

                <p>Pedidos Pendentes</p>
              </div>
              <div class="icon">
                <i class="far fa-clock text-warning"></i>
              </div>
              <a href="<?= url("admin/listar/pedidos/Pendente") ?>" class="small-box-footer bg-warning">Ver Todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box border border-3 border-primary text-primary shadow">
              <div class="inner">
                <h3><?php echo $qtdUsuarios?></h3>

                <p>Clientes Cadastrados</p>
              </div>
              <div class="icon">
                <i class="far fa-user text-primary"></i>
              </div>
              <a href="<?= url("admin/listar/clientes") ?>" class="small-box-footer bg-primary">Ver Todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box border border-3 border-danger text-danger shadow">
              <div class="inner">
                <h3><?php echo $qtdAdmins?></h3>

                <p>Funcionários Cadastrados</p>
              </div>
              <div class="icon">
                <i class="far fa-user-crown text-danger"></i>
              </div>
              <a href="<?= url("admin/listar/admins") ?>" class="small-box-footer bg-danger">Ver Todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-bar mr-1"></i>
                  Pedidos
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart">
                      <canvas id="bar-chart"></canvas>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col -->
          <section class="col-md-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  Pedidos
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart">
                      <canvas id="line-chart"></canvas>
                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= url("View/assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= url("View/assets/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('bar-chart').getContext('2d');
  const barChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
        ],
        datasets: [
          {
            label: 'Total de Pedidos',
            data: [100, 180, 250, 400, 300, 550],
            backgroundColor: [
                'rgba(0, 55, 255, 0.4)',
            ],
            borderColor: [
                'rgba(0, 55, 255, 1)',
            ],
            borderWidth: 1,
            borderRadius: Number.MAX_VALUE
          },
          {
            label: 'Pedidos Entregues',
            data: [95, 170, 243, 386, 280, 548],
            backgroundColor: [
                'rgba(0, 250, 55, 0.4)',
            ],
            borderColor: [
                'rgba(0, 250, 55, 1)',
            ],
            borderWidth: 1,
            borderRadius: Number.MAX_VALUE
          },
          {
            label: 'Pedidos Cancelados',
            data: [5, 10, 7, 14, 20, 2],
            backgroundColor: [
                'rgba(255, 0, 55, 0.4)',
            ],
            borderColor: [
                'rgba(255, 0, 55, 1)',
            ],
            borderWidth: 1,
            borderRadius: Number.MAX_VALUE
          },
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels:{
              font: {
                size: 16,
                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif",
              }
            },
          },
        }
      },
    }
  );
  const cty = document.getElementById('line-chart').getContext('2d');
  const lineChart = new Chart(cty, {
      type: 'line',
      data: {
        labels: [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
        ],
        datasets: [
          {
            label: 'Total de Pedidos',
            data: [100, 180, 250, 400, 300, 550],
            backgroundColor: [
                'rgba(0, 55, 255, 0.4)',
            ],
            borderColor: [
                'rgba(0, 55, 255, 1)',
            ],
            borderWidth: 1,
          },
          {
            label: 'Pedidos Entregues',
            data: [95, 170, 243, 386, 280, 548],
            backgroundColor: [
                'rgba(0, 250, 55, 0.4)',
            ],
            borderColor: [
                'rgba(0, 250, 55, 1)',
            ],
            borderWidth: 1,
          },
          {
            label: 'Pedidos Cancelados',
            data: [5, 10, 7, 14, 20, 2],
            backgroundColor: [
                'rgba(255, 0, 55, 0.4)',
            ],
            borderColor: [
                'rgba(255, 0, 55, 1)',
            ],
            borderWidth: 1,
          },
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels:{
              font: {
                size: 16,
                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif",
              }
            },
          },
        }
      },
    }
  );
</script>
<!-- Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- Sparkline -->
<script src="<?= url("View/assets/plugins/sparklines/sparkline.js")?>"></script>
<!-- JQVMap -->
<script src="<?= url("View/assets/plugins/jqvmap/jquery.vmap.min.js")?>"></script>
<script src="<?= url("View/assets/plugins/jqvmap/maps/jquery.vmap.usa.js")?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= url("View/assets/plugins/jquery-knob/jquery.knob.min.js")?>"></script>
<!-- daterangepicker -->
<script src="<?= url("View/assets/plugins/moment/moment.min.js")?>"></script>
<script src="<?= url("View/assets/plugins/daterangepicker/daterangepicker.js")?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= url("View/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")?>"></script>
<!-- Summernote -->
<script src="<?= url("View/assets/plugins/summernote/summernote-bs4.min.js")?>"></script>
<!-- overlayScrollbars -->
<script src="<?= url("View/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= url("View/assets/js/adminlte.js")?>"></script>
</body>
</html>
