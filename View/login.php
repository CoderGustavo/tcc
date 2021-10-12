<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delicious Hamburgueria</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?= url("View/assets/img/favicon1.png") ?>" rel="icon">
    <link rel="stylesheet" href="<?= url("View/assets/css/login.css") ?>">

  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="<?= url("acessar") ?>">
        <?php
          session_start();
          if(isset($_SESSION["sucesso"])){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Parabens!</strong> <?php echo $_SESSION["sucesso"]; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

        <?php } else if(isset($_SESSION["erro"])){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erro:</strong> <?php echo $_SESSION["erro"]; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

        <?php } session_destroy(); ?>


      <img class="mb-4" src="<?= url("View/assets/img/favicon1.png") ?>" alt="" width="72" height="72">

      <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">ACESSAR</h1>

      <input type="email" name="email" id="" class="form-control mb-3" placeholder="Email:" />
      <input type="password" name="senha" id="" class="form-control" placeholder="Senha:" />  

      <button type="submit" class="btn btn-lg btn-primarycolor btn-block mt-4 mb-2">Acessar</button>
      <a href="<?= url("cadastro") ?>" class="btn text-light">Ainda não possue uma conta? <span class="text-primarycolor">Crie aqui!</span></a>
      <br>

      <p class="mt-5 mb-3 text-muted">Hamburgueria Delicious &copy;2021</p>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>