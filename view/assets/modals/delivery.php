<?php
  require_once '../model/Endereco.php';
  session_start();
  $endereco = new Endereco();
  $lista = $endereco->listar($_SESSION["id_usuario"]);
?>


<div class="modal fade" id="deliverymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content bg-darkdark">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title text-uppercase" style="font-family:Arial, Helvetica, sans-serif" id="exampleModalLongTitle">Escolha de endereço</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
          <?php foreach($lista as $key => $linha):?>
          <div class="col-lg-6 p-2">
            <label class="container border border-primarycolor rounded" for="end1">
                <div class="row mt-2">
                    <div class="col-6">
                        <input type="radio" name="endereco" id="end1" class="text-dark">
                    </div>
                    <div class="col-6 text-right">
                        <a href="" class="text-primarycolor">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <p class="m-1">Rua: <?php echo $linha["logradouro"]?></p>
                        <p class="m-1">Bairro: <?php echo $linha["numero"]?></p>
                        <p class="m-1">Número: <?php echo $linha["bairro"]?></p>
                        <p class="m-1">Referência: <?php echo $linha["referencia"]?></p>
                    </div>
                </div>
            </label>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="modal-footer border-top-0">
          <button type="button" class="btn btn-add-end" data-toggle="modal" data-target="#addendereco_modal">Adicionar novo endereço</button>
          <button type="submit" class="btn btn-primarycolor">Continuar</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="addendereco_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content bg-darkdark border-primarycolor">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-uppercase" style="font-family:Arial, Helvetica, sans-serif" id="exampleModalLongTitle">Escolha de endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="col-12 mb-3">
          <label for="txtrua">Rua: </label>
          <input type="text" placeholder="Digite sua Rua: " id="txtrua" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtbairro">Bairro: </label>
          <input type="text" placeholder="Digite seu bairro: " id="txtbairro" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtnumero">Número: </label>
          <input type="text" placeholder="Digite seu número: " id="txtnumero" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtreferencia">Referência: </label>
          <input type="text" placeholder="Digite uma referência: " id="txtreferencia" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
      </div>
      <div class="modal-footer border-top-0">
        <button type="button" class="btn btn-add-end" data-dismiss="modal">Voltar</button>
        <button type="submit" class="btn btn-primarycolor">Continuar</button>
      </div>
    </div>
  </div>
</div>