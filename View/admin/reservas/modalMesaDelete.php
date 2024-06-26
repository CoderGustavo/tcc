<?php if($reservas): foreach($reservas as $linha): ?>
<div id="mesadelete<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mesa Deletar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você deseja deletar a mesa <?php echo $linha->id?>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
        <a href="<?= url("admin/deletar/mesa/$linha->id") ?>" class="btn btn-success"> Sim, desejo </a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>