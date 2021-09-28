<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delicious Hamburgueria</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/img/favicon1.png" rel="icon">
    <link rel="stylesheet" href="assets/css/login.css">
  </head>
  <body>
    <form class="form-signin" method="POST" action="../controller/usuario/cadastrar-usuario.php">
      <?php
        session_start();
        if(isset($_SESSION["erro"])){
      ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> <?php echo $_SESSION["erro"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

      <?php } session_destroy(); ?>

    

      <img class="mb-4" src="assets/img/favicon1.png" alt="" width="72" height="72">

      <h1 class="h3 mb-5 font-weight-normal text-light text-uppercase">Cadastrar</h1>

      <label for="inputNome" class="sr-only">Nome</label>
      <input type="text" name="nome" id="inputNome" class="form-control mb-3" placeholder="Nome" />

      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="E-mail" />

      <label for="inputTelefone" class="sr-only">Telefone</label>
      <input type="text" name="telefone" id="inputTelefone" class="form-control mb-3" placeholder="Telefone" />

      <label for="inputSenha" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputSenha" class="form-control mb-3" placeholder="Senha" />  

      <label for="inputConfirmaSenha" class="sr-only">Comfirmar Senha</label>
      <input type="password" name="confirmarsenha" id="inputConfirmaSenha" class="form-control" placeholder="Confirmar Senha" />  

      <button type="submit" class="btn btn-lg btn-primarycolor btn-block mb-2 mt-4">Cadastrar</button>  
      <a href="login.php" class="btn text-light" >Já possue um conta? Acesse aqui!</a>


      <p class="mt-5 mb-3 text-muted">Hamburgueria Delicious &copy;2021</p>
    </form>     
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>