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
  <body class="text-center">
    <form class="form-signin" method="post" action="<?= url("acessar") ?>">
        <?php if(isset($_SESSION["sucesso"])):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Parabens!</strong> <?php echo $_SESSION["sucesso"]; unset($_SESSION["sucesso"]); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

        <?php elseif(isset($_SESSION["erro"])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erro:</strong> <?php echo $_SESSION["erro"]; unset($_SESSION["erro"]); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

        <?php endif; ?>

      <a href="<?= url("") ?>">
        <img class="mb-4" src="<?= url("View/assets/img/favicon1.png") ?>" alt="" width="72" height="72">
      </a>

      <?php if(isset($traduzir)): ?>
        <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">LOG IN</h1>
        <div>
          <p class="text-light label">E-mail</p>
          <input type="email" name="email" class="form-control mb-3 text-light" placeholder="E-mail:" value="<?php if(isset($_SESSION["valores"]["email"])){echo $_SESSION["valores"]["email"];} unset($_SESSION["valores"]);?>" />
        </div>
        <div class="position-relative">
          <p class="text-light label">Password</p>
          <input type="password" name="senha" class="form-control text-light" placeholder="Password:" />
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
  
        <button type="submit" class="btn btn-lg btn-primarycolor btn-block mt-4 mb-2">LOG IN</button>
        <a href="<?= url("cadastro") ?>" class="btn text-light">Don't you have account? <span class="text-primarycolor">Create one!</span></a>
      <?php else: ?>
        <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">ACESSAR</h1>
        <div>
          <p class="text-light label">E-mail</p>
          <input type="email" name="email" class="form-control mb-3 text-light" placeholder="E-mail:" value="<?php if(isset($_SESSION["valores"]["email"])){echo $_SESSION["valores"]["email"];} unset($_SESSION["valores"]);?>" />
        </div>
        <div class="position-relative">
          <p class="text-light label">Senha</p>
          <input type="password" name="senha" class="form-control text-light" placeholder="Senha:" />
          <a href="" class="btn-view-pass"><i class="text-primarycolor fas fa-eye"></i></a>
        </div>
  
        <button type="submit" class="btn btn-lg btn-primarycolor btn-block mt-4 mb-2">Acessar</button>
        <a href="<?= url("cadastro") ?>" class="btn text-light">Ainda não possue uma conta? <span class="text-primarycolor">Crie aqui!</span></a>
      <?php endif; ?>

      <br>

      <p class="mt-5 mb-3 text-muted">Hamburgueria Delicious &copy;2021</p>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?= url("View/assets/js/login.js") ?>"></script>
  </body>
</html>