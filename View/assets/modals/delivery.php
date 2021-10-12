<div class="modal fade" id="deliverymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <form class="modal-content bg-darkdark" method="POST" action="../controller/endereco/inserir.php">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title text-uppercase" style="font-family:Arial, Helvetica, sans-serif" id="exampleModalLongTitle">Escolha de endereço</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
          <?php if(count($enderecos) > 0){ foreach($enderecos as $key => $linha): ?>
            <div class="col-lg-6 p-2">
              <label class="container border border-primarycolor rounded endereco-item" for="end<?php echo $key; ?>">
                  <div class="row mt-2">
                      <div class="col-6">
                          <input type="radio" name="endereco" id="end<?php echo $key; ?>" class="text-dark" <?php if($key == 0){?> checked <?php } ?> >
                      </div>
                      <div class="col-6 text-right">
                          <a href="" class="text-primarycolor">
                              <i class="fas fa-trash"></i>
                          </a>
                      </div>
                      <div class="col-12">
                          <p class="m-1">Rua: <?php echo $linha->logradouro?></p>
                          <p class="m-1">Bairro: <?php echo $linha->numero?></p>
                          <p class="m-1">Número: <?php echo $linha->bairro?></p>
                          <p class="m-1">Referência: <?php echo $linha->referencia?></p>
                      </div>
                  </div>
              </label>
            </div>
          <?php endforeach; }else{?>
            <div class="col-12 mb-3">
              <label for="txtrua">Rua: </label>
              <input type="text" name="rua" placeholder="Digite sua Rua: " id="txtrua" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
            </div>
            <div class="col-12 mb-3">
              <label for="txtbairro">Bairro: </label>
              <input type="text" name="bairro" placeholder="Digite seu bairro: " id="txtbairro" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
            </div>
            <div class="col-12 mb-3">
              <label for="txtnumero">Número: </label>
              <input type="text" name="numero" placeholder="Digite seu número: " id="txtnumero" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
            </div>
            <div class="col-12 mb-3">
              <label for="txtreferencia">Referência: </label>
              <input type="text" name="referencia" placeholder="Digite uma referência: " id="txtreferencia" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
            </div>
          <?php }?>  
        </div>
        <div class="modal-footer border-top-0">
          <?php if(count($enderecos) > 0){?>
          <button type="button" class="btn btn-add-end" data-dismiss="modal" data-toggle="modal" data-target="#addendereco_modal">Adicionar novo endereço</button>
          <button type="button" class="btn btn-primarycolor" data-dismiss="modal" data-toggle="modal" data-target="#formaspagamento_modal">Continuar</button>
          <?php }else{?>
            <button type="submit" class="btn btn-primarycolor">Continuar</button>
          <?php }?>
        </div>
      </form>
    </div>
</div>

<div class="modal fade" id="addendereco_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <form class="modal-content bg-darkdark border-primarycolor" method="POST" action="../controller/endereco/inserir.php">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-uppercase" style="font-family:Arial, Helvetica, sans-serif" id="exampleModalLongTitle">Cadastro de endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="col-12 mb-3">
          <label for="txtrua">Rua: </label>
          <input type="text" name="rua" placeholder="Digite sua Rua: " id="txtrua" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtbairro">Bairro: </label>
          <input type="text" name="bairro" placeholder="Digite seu bairro: " id="txtbairro" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtnumero">Número: </label>
          <input type="text" name="numero" placeholder="Digite seu número: " id="txtnumero" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
        <div class="col-12 mb-3">
          <label for="txtreferencia">Referência: </label>
          <input type="text" name="referencia" placeholder="Digite uma referência: " id="txtreferencia" class="w-100 m-auto form-control rounded bg-darkdark border border-primarycolor">
        </div>
      </div>
      <div class="modal-footer border-top-0">
        <button type="button" class="btn btn-add-end" data-dismiss="modal" data-toggle="modal" data-target="#deliverymodal">Voltar</button>
        <button type="submit" class="btn btn-primarycolor">Continuar</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="formaspagamento_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <form class="modal-content bg-darkdark border-primarycolor" method="POST" action="../controller/endereco/inserir.php">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-uppercase" style="font-family:Arial, Helvetica, sans-serif" id="exampleModalLongTitle">Escolha   a   forma de pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
            <div class="col-lg-6">
              <div class="m-2 p-2 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento div-pix rounded position-relative" style="height: 10rem;">
                <img src="<?= url("View/assets/img/pix.png") ?>" alt="pix" width="80%">
                <div class="position-absolute d-none" style="right: -0.6rem; bottom: -0.6rem;">
                  <i class="fas fa-check bg-primarycolor p-2 rounded-pill"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="m-2 p-2 border border-primarycolor d-flex justify-content-center align-items-center btn-formapagamento flex-column rounded position-relative" style="height: 10rem;">
                <div>
                  <h4 class="m-0 p-0 text-primarycolor mt-2" style="font-family: Arial, Helvetica, sans-serif;">Cartão de Crédito</h4>
                </div>
                <div>
                  <img src="<?= url("View/assets/img/credit-card.png") ?>" alt="cartao de credito" width="100%">
                </div>
                <div class="position-absolute d-none" style="right: -0.6rem; bottom: -0.6rem;">
                  <i class="fas fa-check bg-primarycolor p-2 rounded-pill"></i>
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer border-top-0">
        <button type="button" class="btn btn-add-end" data-dismiss="modal" data-target="#deliverymodal" data-toggle="modal">Voltar</button>
        <button type="button" class="btn btn-primarycolor">Continuar</button>
      </div>
    </form>
  </div>
</div>