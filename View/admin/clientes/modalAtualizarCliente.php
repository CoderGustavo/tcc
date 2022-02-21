<?php if($usuarios): foreach($usuarios as $linha): ?>
<div id="ClienteParaAdmin<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atualizando cliente para Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= url("admin/transformar/clientes/admins") ?>" method="post">
        <div class="modal-body">
          <p>Você deseja atualizá-lo?</p>
          <input type="hidden" name="id" value="<?php echo $linha->id?>">
          <label for="nivelacesso">Nivel de Acesso:</label>
          <select class="custom-select mb-3" id="nivelacesso" name="nivel_acesso">
            <option selected value="4">Garçom</option>
            <option value="3">Chapeiro</option>
            <option value="2">Caixa</option>
            <option value="1">Admin</option>
          </select>
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