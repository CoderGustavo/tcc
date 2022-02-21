<?php if($reservas): foreach($reservas as $linha): ?>
<div id="reservarmesa<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reservando mesa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= url("admin/reserva/reservar/") ?>" method="post">
        <div class="modal-body">
          <p>Você deseja reservar a mesa <?php echo $linha->id ?>?</p>
          <label for="numeropessoas">Número de pessoas:</label>
          <input type="number" class="form-control" id="numeropessoas" name="numeropessoas" placeholder="Número de pessoas" value="2">
          <input type="hidden" name="id" value="<?php echo $linha->id?>">
          <input type="hidden" name="status" value="<?php echo $status?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
          <button type="submit" class="btn btn-success"> Sim, desejo </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>