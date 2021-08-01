<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delicious Hamburgueria</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/img/favicon1.png" rel="icon">

    <style>
      .form-signin1{
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      body{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        background-color: #232322;
      }

      .branquin, h3{
        color: #fff;
      }

      .form-control1 {
        display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #fff;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }

      a:link {
        text-decoration: none;
      }

      a {
        color: white;
      }

      a:hover {
        color: #808080;
      }
    </style>
</head>
<body class="text-center">
<form class="form-signin1" method="POST" action="../controller/usuario/cadastrar-usuario.php">

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

    <h1 class="h3 mb-5 font-weight-normal branquin">Cadastrar-se</h1>

    <label for="inputNome" class="sr-only">Nome</label>
    <input type="text" name="nome" id="inputNome" class="form-control mb-3" placeholder="Nome" />

    <label for="inputEndereco" class="sr-only">E-mail</label>
    <input type="text" name="endereco" id="inputEndereco" class="form-control mb-3" placeholder="Endereço" />

    <label for="inputTelefone" class="sr-only">Telefone</label>
    <input type="tex" name="telefone" id="inputTelefone" class="form-control mb-3" placeholder="Telefone" />

    <label for="inputEmail" class="sr-only">Endereço</label>
    <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="E-mail" />

    <label for="inputSenha" class="sr-only">Senha</label>
    <input type="password" name="senha" id="inputSenha" class="form-control mb-3" placeholder="Senha" />  

    <label for="inputConfirmaSenha" class="sr-only">Comfirmar Senha</label>
    <input type="password" name="confirmarsenha" id="inputConfirmaSenha" class="form-control" placeholder="Confirmar Senha" />  

    <input type="submit" class="btn btn-lg btn-danger btn-block mt-5 mb-2" value="Cadastrar" />  
    <div>
      <a href="login.php" class="btn btn-outline-danger btn-block mb-3" >Voltar</a>
    </div>
    <a href="/lanchonete" class="botoes" >Tela inicial</a>


  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>     
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
</body>
</html>