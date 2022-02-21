<?php if($reservas): foreach($reservas as $linha): ?>
<div id="pagamentoDivididop<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Realizando o pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <p>Você deseja realizar o pagamento da mesa <?php echo $linha->id ?> dividindo por quantas pessoas?</p>
          <div class="text-center">
            <h2>Total: R$ <?php echo $linha->total ?></h2>
            <h3></h3>
            <label for="numeropessoas">Número de pessoas:</label>
            <input type="number" class="form-control" id="numeropessoas" name="numeropessoas" placeholder="Número de pessoas" value="2">
            <input type="hidden" name="id" value="<?php echo $linha->id?>">
            <input type="hidden" name="status" value="<?php echo $status?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#pagamento<?php echo $linha->id ?>">Voltar</button>
          <button type="button" class="btn btn-primary confirm-conta">Calcular</button>
          <button type="submit" class="btn btn-success">Pagamento Realizado</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>
