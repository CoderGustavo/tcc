<?php 
	require_once '../../model/Pedido.php';
	require_once '../../model/Itens_pedido.php';
	require_once '../../model/Cardapio.php';

	$cardapio= new Cardapio();
	$card = $cardapio->listarCardapio();

	foreach($card as $indice => $item){
		if(isset($_POST["pedido".$indice])){
			$pedidonome[$indice] = $_POST["pedido".$indice];
			$pedidoqtd[$indice] = $_POST["qtd".$indice];
			$pedidopreco[$indice] = $_POST["preco".$indice];
			$pedidonomei = implode(", ", $pedidonome);
			$pedidoqtdi = implode(", ", $pedidoqtd);
			$pedidoprecoi = array_sum($pedidopreco);
		}
	}

	if(isset($pedidonomei) && isset($pedidoqtdi)){
		$nome = explode(',',$pedidonomei);
		$qtd = explode(',',$pedidoqtdi);
	
		$pedido = new Pedido();

		$pedido->idUsuario = $_SESSION["id_usuario"];
		$pedido->idEndereco = 1;
		$pedido->formaPagamento = "dinheiro";
		$pedido->obs = $_POST['obs'];
		$pedido->total = $pedidoprecoi;
	
		$pedido->inserir();

		foreach($nome as $indice => $value){

			$itens_pedido = new Itens_pedido();

			$itens_pedido->nome = $nome[$indice];
			$itens_pedido->quantidade = $qtd[$indice];

			$itens_pedido->inserir();
		}
		
	}else{
		echo "Erro: nenhum item foi selecionado!";
	}



 ?>