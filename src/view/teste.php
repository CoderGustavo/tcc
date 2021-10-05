<?php

require_once '../model/Cardapio.php';
$cardapio= new Cardapio();
$card = $cardapio->listarCardapio();

foreach($card as $linha){?>
    <p>
        <?php foreach($linha["ingredientes"] as $a){?>
        <p>
            <?php echo $linha['id']?>
            <?php echo $a['nome']?>
        </p>
        <?php } ?>
    </p>

<?php } ?>