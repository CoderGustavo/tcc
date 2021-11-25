<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= url("admin") ?>" class="brand-link border-0 text-center">
      <img src="<?= url("View/assets/img/favicon1.png") ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-uppercase">Administração</span>
    </a>
    
    <a href="#" class="brand-link">
      <img src="<?= url("View/assets/img/perfil.png") ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text text-light text-capitalize"><?php echo explode(" ", $usuario->nome)[0] ?></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item text-center          ">
              <a href="<?= url("admin") ?>" class="nav-link callout bg-transparent          
            <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin"){
                echo "callout-light";
              }else{
                echo "callout-transparent";
              }
            ?>
          ">
                <i class="fas fa-cogs nav-icon"></i>
                <p>Informações gerais</p>
              </a>
          </li>
          <?php if($admin->nivel_acesso <= 2):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/clientes"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
              <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/clientes"
                ){
                echo "callout-light";
                }else{
                echo "callout-transparent";
                }
              ?>
            ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Clientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/clientes") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/clientes"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Listar Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 1):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/admins" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/admin"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/admins" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/admin"
              ){
              echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon fas fa-user-crown"></i>
              <p>
                Administradores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/cadastrar/admin") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/admin"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Cadastrar administrador</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/admins") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/admins"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Listar administradores</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 3):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/ingrediente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/ingredientes"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/ingrediente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/ingredientes"
              ){
                echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon fas fa-steak"></i>
              <p>
                Ingredientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($admin->nivel_acesso <= 1):?>
              <li class="nav-item text-center">
                <a href="<?= url("admin/cadastrar/ingrediente") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/ingrediente"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Cadastrar Ingrediente</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/ingredientes") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/ingredientes"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Listar Ingredientes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 3):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/cardapio" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/cardapio"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/cardapio" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/cardapio"
              ){
                echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon fas fa-cheeseburger"></i>
              <p>
                Cardápio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($admin->nivel_acesso <= 1):?>
              <li class="nav-item text-center">
                <a href="<?= url("admin/cadastrar/cardapio") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/cardapio"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Cadastrar Item</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/cardapio") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/cardapio"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Listar Cardápio</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 1):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/categoria" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/categorias"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
              <?php if(
                $_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/categoria" ||
                $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/categorias"
                ){
                echo "callout-light";
                }else{
                echo "callout-transparent";
                }
              ?>
            ">
              <i class="nav-icon fas fa-filter"></i>
              <p>
                Categorias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/cadastrar/categoria") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/cadastrar/categoria"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Cadastrar Categoria</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/categorias") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/categorias"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Listar Categorias</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 2 || $admin->nivel_acesso == 4):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Livre" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Realizada" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Utilizada" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Livre" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Realizada" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Utilizada" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas"
              ){
                echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon">
                <img src="<?= url("View/assets/img/table.png") ?>" alt="" width="25px">
              </i>
              <p>
                Mesas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/reservas/Realizada") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Realizada"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Reservas Realizadas</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/reservas/Livre") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Livre"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Mesas Livres</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/reservas/Utilizada") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas/Utilizada"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Mesas sendo utilizadas</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/reservas") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/reservas"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Todas as Mesas</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 4):?>
          <li class="nav-item
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Pendente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Aprovado" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Pendente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Aprovado" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes"
              ){
                echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Avaliações
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/avaliacoes/Pendente") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Pendente"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Avaliações pendentes</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/avaliacoes/Aprovado") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes/Aprovado"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Avaliações aprovados</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/avaliacoes") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/avaliacoes"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Todas avaliações</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; if($admin->nivel_acesso <= 3):?>
          <li class="nav-item 
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Pendente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Em%20Preparo" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Entregue" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Cancelado" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos"
              ){
              echo "menu-open";
              }
            ?>
            ">
            <a href="#" class="nav-link callout bg-transparent
            <?php if(
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Pendente" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Em%20Preparo" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Entregue" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Cancelado" ||
              $_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos"
              ){
                echo "callout-light";
              }else{
              echo "callout-transparent";
              }
            ?>
            ">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Pedidos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/pedidos/Pendente") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Pendente"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Pedidos pendentes</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/pedidos/Em Preparo") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Em%20Preparo"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Pedidos em preparo</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/pedidos/Entregue") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Entregue"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Pedidos entregues</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/pedidos/Cancelado") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos/Cancelado"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Pedidos cancelados</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a href="<?= url("admin/listar/pedidos") ?>" class="nav-link callout bg-transparent <?php if($_SERVER["REQUEST_URI"] == "/tcc/admin/listar/pedidos"){ echo "callout-warning color-primarycolor";}else{echo "callout-transparent";}?>">
                  <p>Todos pedidos</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-item text-center">
            <a href="<?= url("") ?>" class="nav-link callout bg-transparent callout-transparent">
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