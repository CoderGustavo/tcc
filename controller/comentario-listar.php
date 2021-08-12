<link href="../assets/img/favicon1.png" rel="icon">
<?php require_once 'classe/Avaliacao.php';
$avaliacao = new Avaliacao();
$lista = $avaliacao->listar();
session_start();
$logado = $_SESSION['usuario_logado'];

if ($logado == 1) {
?>


<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/navbar.php' ?>   

<div class="row">

  <style>
    .espaco {
      margin-top: 7px;
    }

  </style>
  
  
  
  <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap
        flex-md-nowrap align-items-center pt-3 pb-2">
    
    </div> 
        <br>
        <br>
        <h2> Lista de comentários pendentes: </h2>


    <div class="table-responsive">
      <table class="table table-striped" width="100">
        <thead>
          <tr>
            <th width="10"> Id </th>
            <th> Nome </th>
            <th> Comentário </th>
            <th> Data/Hora </th>
            <th> Status </th>
            <th> Opções </th>
          </tr>
        </thead>
        <tbody> 
          <?php foreach ($lista as $linha): ?>
          <tr>
            <td> <?php echo $linha['id'] ?> </td>
            <td> <?php echo $linha['nome'] ?> </td>
            <td> <?php echo $linha['avaliacao'] ?> </td>
            <td> <?php echo $linha['datahora'] ?> </td>
            <td> <?php echo $linha['status'] ?> </td>
            <td>
              <a href="avaliacao-aprovar.php?idAvaliacao=<?php echo $linha['id'] ?>"
                 class="btn btn-sm btn-success">Aprovar</a>
              <a href="avaliacao-excluir.php?idAvaliacao=<?php echo $linha['id'] ?>"
                 class="btn btn-sm btn-danger espaco">Excluir</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</main>

</div>

<?php require_once 'layout/footer.php' ?>
<?php } else{ header('location: usuario-nao-logado.php');  } ?>