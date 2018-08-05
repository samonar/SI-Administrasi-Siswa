<body>
  <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2</h3>
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo $action; ?>" method="post" >
                <div class="row">
                <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label>NIS <?php echo form_error('nis')?></label>
                    <input type="text"  class="form-control" id="nis" placeholder="Enter NIS" name="nis" value="<?php echo $nis;?>">
                  </div>
                  <div class="form-group">
                    <label>Kelas <?php echo form_error('id_kelas')?></label>
                    <input type="text"  class="form-control" id="id_kelas"  name="id_kelas" value="<?php echo $id_kelas;?>">
                  </div>
                  <div class="form-group">
                    <label>th akademik <?php echo form_error('th_akademik')?></label>
                    <input type="text"  class="form-control" id="id_th_akademik"  name="id_th_akademik" value="<?php echo $id_th_akademik;?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Siswa <?php  echo form_error('nama_siswa')?></label>
                    <input type="text" class="form-control" id="nama_siswa" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $nama_siswa;?>">
                  </div>
                  <div class="form-group">
                    <label>ID virtual <?php echo form_error('id_virtual') ?></label>
                    <input type="text" class="form-control" id="id_virtual" placeholder="ID virtual" name="id_virtual" value"<?php echo $id_virtual;?>">
                  </div>
                  <div class="form-group">
                      <label>Jenis Kelamin <?php echo form_error('jk'); ?></label>
                      <select class="form-control" name="jk" id="jk">
                        <?php   if ($jk=='p') {
                             ?> <option value="l">laki laki</option>
                                <option selected="" value="p">perempuan</option><?php
                        }else{
                          ?><option selected="" value="l">laki laki</option>
                            <option value="p">perempuan</option><?php
                        }?>
                      </select>
                    </div>
                </div>
              </div>


          </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
                </div>
              </form>
        </div>
	</form>
  </body>
