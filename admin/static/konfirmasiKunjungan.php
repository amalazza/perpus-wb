
<?php if (empty($this->oKunjunganK)): ?>
    <?php else: ?>
    <form action="<?=ROOT_URL?>?p=kunjungan&amp;a=konfirmasi&amp;id=<?=$oKunjungan->no_kunjungan?>" method="post" style="display: inline">
      <div id="konfirmasiKunjungan2" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Konfirmasi Kepulangan Kunjungan</h4>
            </div>
            <div class="modal-body">
              <input class=" form-control" id="no_kunjungan" name="no_kunjungan" type="text" value="<?=$oKunjungan->no_kunjungan?>" style="display: none"/>
              <div class="form-group">
                <label class="control-label">No Anggota</label>
                <input type="text" name="no_anggota" id="no_anggota" value="<?=$this->oKunjunganK->no_anggota?>" class="form-control" readonly="true"/>
              </div>
              <div class="form-group">
                <label class="control-label">Nama</label>
                <input type="text" name="nama" id="nama" value="<?=$oKunjungan->nama?>" class="form-control" readonly="true"/>
              </div>
              <div class="form-group">
                <label class="control-label">Waktu Kedatangan</label>
                <input type="text" name="waktu_kunjungan" id="waktu_kunjungan" value="<?=$oKunjungan->waktu_kunjungan?>" class="form-control" readonly="true"/>
              </div>
              <div class="form-group">
                  <label class="control-label">Waktu Kepulangan</label>
                  <input type="text" name="waktu_kepulangan" id="waktu_kepulangan" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d H:i:s');?>" class="form-control" readonly="true"/>
              </div>                
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="edit" value="1">Konfirmasi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php endif; ?>