<link href="../assets/img/favicon1.png" rel="icon">
<?php require_once 'classe/Reserva.php';
$reserva = new Reserva();
$lista = $reserva->listar();
session_start();
$logado = $_SESSION['usuario_logado'];
if ($logado == 1) {

?>

<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/navbar.php' ?>   

<div class="row">
  
  

  <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
    <div class="d-flex justify-content-between flex-wrap
        flex-md-nowrap align-items-center pt-3 pb-2">
    </div> 
        <br>
        <br>
        <h2> Lista de reservas cadastradas: </h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th> Id </th>
            <th> Nome </th>
            <th> Telefone </th>
            <th> E-mail </th>
            <th> Data </th>
            <th> Hora </th>
            <th> Nº de pessoas </th>
            <th> Observações </th>
            <th> Opção </th>
          </tr>
        </thead>
        <tbody> 
          <?php foreach ($lista as $linha): ?>
          <tr>
            <td> <?php echo $linha['idReserva'] ?> </td>
            <td> <?php echo $linha['nome'] ?> </td>
            <td> <?php echo $linha['telefone'] ?> </td>
            <td> <?php echo $linha['email'] ?> </td>
            <td> <?php echo $linha['data'] ?> </td>
            <td> <?php echo $linha['horario'] ?> </td>
            <td> <?php echo $linha['numeropessoas'] ?> </td>
            <td> <?php echo $linha['obs'] ?> </td>
            <td>
               <a href="reserva-editar.php?idReserva=<?php echo $linha['idReserva'] ?>"
                 class="btn btn-sm btn-warning">Editar</a>  
              <a href="reserva-excluir.php?idReserva=<?php echo $linha['idReserva'] ?>"
                 class="btn btn-sm btn-danger">Excluir</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</main>

</div>

<?php require_once 'layout/footer.php' ?>
<?php } else { header('Location: usuario-nao-logado.php'); } ?>