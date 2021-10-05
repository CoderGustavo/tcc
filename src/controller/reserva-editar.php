<link href="../assets/img/favicon1.png" rel="icon">
<?php
	require_once 'classe/Reserva.php';
	$idReserva = $_GET['idReserva'];
	$sql = "SELECT * FROM reserva WHERE idReserva = '$idReserva'";
	$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
	$resultado = $conexao->query($sql);
	$lista = $resultado->fetch(PDO::FETCH_ASSOC);

?>
<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/navbar.php' ?>   

<div class="row">
  
  
   
	<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
		<div class="d-flex justify-content-between flex-wrap 
			flex-md-nowrap align-items-center pt-3 pb-2">
		</div>
		<br>
		<div class="alinhamento">
		<form class="form-horizontal" action="reserva-editar-salvar.php" method="post">
            <input type="hidden" name="idReserva" value="<?php echo $lista['idReserva'] ?>">
            
			<div class="form-group col-md-6">
				<label for="nome" class="col-md-3 control-label editar">Nome:</label>
				<div class="col-md-10">
					<input type="text" class="form-control1" id="nome" name="nome"
							value="<?php echo $lista['nome'] ?>">
				</div> 
			</div>
			<div class="form-group col-md-6">
				<label for="telefone" class="col-md-3 control-label editar">Telefone:</label>
				<div class="col-md-10">
					<input type="text" class="form-control1" id="telefone" name="telefone"
							value="<?php echo $lista['telefone'] ?>">
				</div> 
			</div> 
			<div class="form-group col-md-6">
				<label for="email" class="col-md-3 control-label editar">E-mail</label>
				<div class="col-md-4">
					<input type="text" class="form-control1" id="email" name="email" value="<?php echo $lista['email'] ?>">
				</div> 
			</div>
			<div class="form-group col-md-6">
				<label for="data" class="col-md-3 control-label editar">Data</label>
				<div class="col-md-4">
					<input type="text" class="form-control1" id="data"  name="data" value="<?php echo $lista['data'] ?>">
				</div> 
			</div>
			<div class="form-group col-md-6">
				<label for="horario" class="col-md-3 control-label editar">Hora</label>
				<div class="col-md-4">
					<input type="text" class="form-control1" id="horario"  name="horario" value="<?php echo $lista['horario'] ?>">
				</div> 
			</div>
			<div class="form-group col-md-6">
				<label for="numeropessoas" class="col-md-3 control-label editar">Nº de pessoas</label>
				<div class="col-md-4">
					<input type="text" class="form-control1" id="numeropessoas" maxlength="2" name="numeropessoas" value="<?php echo $lista['numeropessoas'] ?>">
				</div> 
			</div>
			<div class="form-group col-md-6">
				<label for="obs" class="col-md-3 control-label editar">Observações</label>
				<div class="col-md-4">
					<input type="text" class="form-control1" id="obs"  name="obs" value="<?php echo $lista['obs'] ?>">
				</div> 
			</div>

			<div class="form-group col-md-6">
				<label for="groupButton"></label>
				<div class="col-sm-3 col-sm-offset-2">
					<button type="submit" id="groupButton" class="btn btn-success">
			  			Salvar
					</button>
				</div>
			</div>
		</form>
		</div>
	</main>

</div>

<?php require_once 'layout/footer.php' ?>