<?php if($categorias): foreach($categorias as $linha): ?>
<div id="deleteCategoria<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluindo categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= url("admin/deletar/categoria") ?>" method="post">
        <div class="modal-body">
          <p>Você deseja excluir o <?php echo $linha->nome ?>?</p>
          <input type="hidden" name="id" value="<?php echo $linha->id?>">
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