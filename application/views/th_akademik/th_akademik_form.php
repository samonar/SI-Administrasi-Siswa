
  <div class="card card-default">

  <div class="card-header">
    <h3 class="card-title">Tambah Tahun akademik</h3>
  </div>
    <form action="<?php echo $action; ?>" method="post">

        <div class="card-body">
          <div class="form-group row">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
    	    <div class="form-group row">
                <label class="col-md-1 offset-md-2" for="varchar">Tahun </label>
                <input type="varchar" class="form-control col-md-3 " name="tahun" id="tahun" placeholder="ex. 2017/2018" value="<?php echo $tahun; ?>" / required>
                <?php echo form_error('tahun') ?>
          </div>
          <div class="form-group row">
                <label class="col-md-1 offset-md-2"for="int">Semester </label>
                <input type="text" class="form-control col-md-3" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" / required>
                <?php echo form_error('semester') ?>
          </div>
          <div class="form-group row">
            <div class="col-md-2 offset-3">
              <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
              <a href="<?php echo site_url('th_akademik/pindah_semester') ?>" class="btn btn-default">Cancel</a>
            </div>
        </div>
        </div>

	</form>


</div>
