
  <form action="<?php echo $action ?>" method="post" class="form" novalidate="">
    <div class="col col-lg-4 offset-md-5" >
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </div>
        <div class="form-group" >
          <label class="col col-lg-3 offset-md-3">Genarare Tagihan Tahun akademik <?php echo form_error('id_th_akademik')?></label>

              <?php foreach($th_aktif->result() as $row){ ?>
                <div class="col-md-4 offset-md-3">
                  <input type="varchar" class="form-control" name="th_aktif" id="th_aktif"  value="<?php echo $row->tahun;?>-<?php
                  if ($row->semester==1) {
                    echo "Ganjil";
                    }else {
                    echo "Genap";
                  }
                   ?>" disabled>
                  <?php echo form_error('tahun') ?>
                </div>
                <?php } ?>
                <input type="hidden" class="form-control" name="th_aktif" id="th_aktif"  value="<?php echo $row->id_th_akademik;?>">
          </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 offset-3">
              <button id="send" type="submit" class="btn btn-success">Generated</button>
              <button onclick="location.href='<?php echo base_url();?>tagihan_siswa_kelas/gentagihan'" type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>
  </form>
