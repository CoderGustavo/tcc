<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= url("conta/minhaconta") ?>" class="brand-link border-0 text-center">
      <img src="<?= url("View/assets/img/favicon1.png") ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-uppercase">Minha Conta</span>
    </a>
    
    <a href="#" class="brand-link">
      <img src="<?= url("View/assets/img/perfil.png") ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text text-light text-capitalize"><?php echo explode(" ", $usuario->nome)[0] ?></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <?php if(isset($traduzir)): ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item text-center">
                <a href="<?= url("conta/minhaconta") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/minhaconta"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="fas fa-user nav-icon"></i>
                  <p>My Account</p>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="<?= url("conta/meuspedidos") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/meuspedidos"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>My Orders</p>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="<?= url("conta/minhasreservas") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/minhasreservas"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="nav-icon">
                    <img src="<?= url("View/assets/img/table.png") ?>" alt="" width="25px">
                  </i>
                  <p>My Reservations</p>
                </a>
            </li>
            <li class="nav-item text-center">
              <a href="<?= url("") ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      <?php else: ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item text-center">
                <a href="<?= url("conta/minhaconta") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/minhaconta"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Minha Conta</p>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="<?= url("conta/meuspedidos") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/meuspedidos"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>Meus Pedidos</p>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="<?= url("conta/minhasreservas") ?>" class="nav-link
                <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/conta/minhasreservas"
                ){
                echo "active";
                }
                ?>
                ">
                  <i class="nav-icon">
                    <img src="<?= url("View/assets/img/table.png") ?>" alt="" width="25px">
                  </i>
                  <p>Minhas Reservas</p>
                </a>
            </li>
            <li class="nav-item text-center">
              <a href="<?= url("") ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Início
                </p>
              </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      <?php endif; ?>
    </div>
    <!-- /.sidebar -->
  </aside>