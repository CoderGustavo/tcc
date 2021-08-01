<?php foreach($lista as $linha): ?>
<div id="excluirReserva<?php echo $linha['idReserva'] ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluindo reserva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você deseja excluir?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
        <a href="../reserva-excluir.php?idReserva=<?php echo $linha['idReserva'] ?>&link=pages/reservapendente.php" class="btn btn-success"> Sim, desejo </a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>