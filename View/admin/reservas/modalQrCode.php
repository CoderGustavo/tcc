<?php if($reservas): foreach($reservas as $key => $linha): ?>
<div id="mesa<?php echo $linha->id ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">QR Code - Mesa <?php echo $linha->id ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo $qrcodes[$linha->id] ?>" alt="" width="100%">
      </div>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>