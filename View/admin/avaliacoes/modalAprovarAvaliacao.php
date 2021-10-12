<?php foreach($avaliacoes as $linha): ?>
<div id="aprovarAvaliacao<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Aprovando avaliação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você deseja aprovar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não, deixa aí</button>
        <a href="../../controller/avaliacao/avaliacao-aprovar.php?id=<?php echo $linha->id ?>&link=../../view/admin/avaliacaoPendente.php" class="btn btn-success"> Sim, desejo </a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>