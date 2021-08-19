 <?php
    require_once '../../model/Usuario.php';
    $usuarioLogado = new Usuario();
    $usuario = $usuarioLogado->ListarUsuarioLogado($_SESSION['id_usuario']);
 ?> 


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link d-flex justify-content-center">
      <img src="../assets/img/favicon1.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">Administração</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
          <img src="dist/img/perfil.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        </div>
        <div class="info text-uppercase">
          <a class="d-block"> <?php echo explode(" ", $usuario['nome'])[0] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="./index.php" class="nav-link active">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Informações gerais</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Usuários
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="listaCliente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Administradores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cadastrarAdmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar administrador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listaAdmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de administradores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Reservas de mesas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reservaPendente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservas pendentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reservaConcluida.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservas concluídas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reservaTotal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todas reservas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Avaliações
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="avaliacaoPendente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avaliações pendentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="avaliacaoAprovado.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Avaliações aprovados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="avaliacaoTotal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos avaliaçãos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Pedidos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pedidoPendente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos pendentes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidoPreparo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos em preparo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidoEntregue.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos entregues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidoCancelado.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos cancelados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidoTotal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Todos pedidos</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>