<?php if($reservas): foreach($reservas as $linha): ?>
<div id="mesalivre<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mesa Livre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você deseja deixar a mesa <?php echo $linha->id?> livre?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
        <?php if($status): ?>
          <a href="<?= url("admin/reserva/livrar/$linha->id/$status") ?>" class="btn btn-success"> Sim, desejo </a>
        <?php else: ?>
          <a href="<?= url("admin/reserva/livrar/$linha->id") ?>" class="btn btn-success"> Sim, desejo </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>