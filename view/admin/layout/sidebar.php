 <?php
    require_once '../../model/Usuario.php';
    $usuarioLogado = new Usuario();
    $usuario = $usuarioLogado->ListarLogado($_SESSION['id_usuario']);
 ?> 


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link border-0">
      <img src="../assets/img/favicon1.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">Administração</span>
    </a>
    
    <a href="#" class="brand-link">
      <img src="dist/img/perfil.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text text-light text-uppercase"><?php echo explode(" ", $usuario['nome'])[0] ?></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">

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
                Clientes
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
          <li class="nav-item">
            <a href="../" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>