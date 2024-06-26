<?php if($pedidos): foreach($pedidos as $linha): ?>
  <div id="atualizarPedido<?php echo $linha->id ?>" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Atualizar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Você deseja atualizar o pedido <?php echo $linha->id ?>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
          <a href="<?= url("admin/pedido/atualizar/$linha->id/$status") ?>" class="btn btn-success"> Sim, desejo </a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; endif; ?>