<?php
    require_once '../../admin/classe/Usuario.php';
    $usuarioLogado = new Usuario();
    $usuario = $usuarioLogado->ListarAdminLogado($_SESSION['id_usuario']);
 
 ?> 


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../../assets/img/favicon1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Minha Conta</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/perfil.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>
        <?php foreach ($usuario as $lista): ?>
        <div class="info">
          <a class="d-block">Usuario</a>
        </div>
        <?php endforeach; ?>
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
                <a href="./index.php" class="nav-link">
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Dados pessoais</p>
                </a>
              </li>
          <li class="nav-item menu">
            <a href="meusPedidos.php" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Meus pedidos
              </p>
            </a>
          </li>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>