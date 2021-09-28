<?php
    require_once '../../model/Usuario.php';
    $usuario = $_SESSION['usuario'];
 ?> 


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link border-0 text-center">
      <img src="../assets/img/favicon1.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-uppercase">Minha Conta</span>
    </a>
    
    <a href="#" class="brand-link">
      <img src="../assets/img/perfil.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text text-light text-capitalize"><?php echo explode(" ", $usuario['nome'])[0] ?></span>
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
                <p>Dados Pessoais</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="./index.php" class="nav-link">
                <i class="fas fa-shopping-bag nav-icon"></i>
                <p>Meus Pedidos</p>
              </a>
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