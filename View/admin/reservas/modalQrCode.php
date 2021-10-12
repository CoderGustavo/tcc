<?php for ($i=1; $i <= 10; $i++): ?>
<div id="mesa<?php echo $i ?>" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">QR Code - Mesa <?php echo $i ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo $qrcodes[$i] ?>" alt="" width="100%">
      </div>
    </div>
  </div>
</div>
<?php endfor; ?>