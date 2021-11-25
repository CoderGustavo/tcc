<?php if($reservas): foreach($reservas as $linha): ?>
<div id="pagamento<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Realizando o pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <p>Você deseja realizar o pagamento da mesa <?php echo $linha->id ?> de qual forma?</p>
          <div class="text-center">
            <h2>Total: R$ <?php echo $linha->total ?></h2>
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal" data-toggle="modal" data-target="#pagamentoDivididop<?php echo $linha->id ?>"> Divisão geral </button>
            <button type="button" class="btn btn-dark"> Por Item </button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>