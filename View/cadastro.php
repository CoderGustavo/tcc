<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delicious Hamburgueria</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?= url("View/assets/img/favicon1.png") ?>" rel="icon">
    <link rel="stylesheet" href="<?= url("View/assets/css/login.css") ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
  </head>
  <body>
    <form class="form-signin" method="post" action="<?= url("cadastrar") ?>">
      <?php if(isset($_SESSION["erro"])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> <?php echo $_SESSION["erro"]; unset($_SESSION["erro"]);?>
            <button type="button" class="close" data-dismiss="alert" aria-p="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

      <?php endif; ?>

      <a href="<?= url("") ?>">
        <img class="mb-4" src="<?= url("View/assets/img/favicon1.png") ?>" alt="" width="72" height="72">
      </a>

      <?php if(isset($traduzir)): ?>
        <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">Register</h1>
        <div>
          <p for="inputNome" class="text-light label">Name</p>
          <input type="text" name="nome" id="inputNome" class="form-control mb-3 text-light" placeholder="Nome" value="<?php if(isset($_SESSION["valores"]["nome"])){echo $_SESSION["valores"]["nome"];} ?>"/>
        </div>
        <div>
          <p for="inputEmail" class="text-light label">E-mail</p>
          <input type="email" name="email" id="inputEmail" class="form-control mb-3 text-light" placeholder="E-mail" value="<?php if(isset($_SESSION["valores"]["email"])){echo $_SESSION["valores"]["email"];} ?>"/>
        </div>
        <div>
          <p for="telefone" class="text-light label">Phone Number</p>
          <input type="text" name="telefone" id="telefone" class="form-control mb-3 text-light" placeholder="Phone Number" value="<?php if(isset($_SESSION["valores"]["telefone"])){echo $_SESSION["valores"]["telefone"];} ?>"/>
        </div>
        <div class="position-relative">
          <p for="senha" class="text-light label">Password</p>
          <input type="password" name="senha" id="senha" class="form-control mb-3 text-light" placeholder="Password" />  
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
        <div class="position-relative">
          <p for="inputConfirmaSenha" class="text-light label">Comfirm Password</p>
          <input type="password" name="confirmasenha" id="inputConfirmaSenha" class="form-control text-light" placeholder="Comfirm Password" />
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
        <div>
          <button type="submit" class="btn btn-lg btn-primarycolor btn-block mb-2 mt-4">Cadastrar</button>  
          <a href="<?= url("login") ?>" class="btn text-light" >Já possue um conta? <span class="text-primarycolor">Acesse aqui!</span></a>
        </div>
      <?php else: ?>
        <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">Cadastre-se</h1>
        <div>
          <p for="inputNome" class="text-light label">Name</p>
          <input type="text" name="nome" id="inputNome" class="form-control mb-3 text-light" placeholder="Nome" value="<?php if(isset($_SESSION["valores"]["nome"])){echo $_SESSION["valores"]["nome"];} ?>"/>
        </div>
        <div>
          <p for="inputEmail" class="text-light label">E-mail</p>
          <input type="email" name="email" id="inputEmail" class="form-control mb-3 text-light" placeholder="E-mail" value="<?php if(isset($_SESSION["valores"]["email"])){echo $_SESSION["valores"]["email"];} ?>"/>
        </div>
        <div>
          <p for="telefone" class="text-light label">Telefone</p>
          <input type="text" name="telefone" id="telefone" class="form-control mb-3 text-light" placeholder="Telefone" value="<?php if(isset($_SESSION["valores"]["telefone"])){echo $_SESSION["valores"]["telefone"];} unset($_SESSION["valores"]); ?>"/>
        </div>
        <div class="position-relative">
          <p for="senha" class="text-light label">Senha</p>
          <input type="password" name="senha" id="senha" class="form-control mb-3 text-light" placeholder="Senha" />
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
        <div class="position-relative">
          <p for="inputConfirmaSenha" class="text-light label">Comfirmar Senha</p>
          <input type="password" name="confirmasenha" id="inputConfirmaSenha" class="form-control text-light" placeholder="Confirmar Senha" />
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
        <div>
          <button type="submit" class="btn btn-lg btn-primarycolor btn-block mb-2 mt-4">Cadastrar</button>  
          <a href="<?= url("login") ?>" class="btn text-light" >Já possue um conta? <span class="text-primarycolor">Acesse aqui!</span></a>
        </div>
      <?php endif; ?>
      


      <p class="mt-5 mb-3 text-muted">Hamburgueria Delicious &copy;2021</p>
    </form>     
    <script src="<?= url("View/assets/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?= url("View/assets/js/jquery.mask.min.js") ?>"></script>
    <script src="<?= url("View/assets/js/mask.js") ?>"></script>
    <script src="<?= url("View/assets/js/login.js") ?>"></script>
  </body>
</html>