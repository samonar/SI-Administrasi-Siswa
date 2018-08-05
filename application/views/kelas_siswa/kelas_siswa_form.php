<body>

                    <!-- /.card-header -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card card-default">
                                <div class="card-header">
                                  <h3 class="card-title">Tambah Siswa Kelas <?php echo $nm_kls ?></h3>
                                </div>

                        <form role="form" action="<?php echo $action; ?>" method="post" >
                          <h4 style="text-align: center;"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h4>
                          <div class="card-body">
                            <label class="col-md-9 offset-md-3" for="varchar"><?php  ?></label>
                            <div class="form-group row">
                                  <label class="col-md-2 offset-md-3" for="varchar">Nis <?php echo form_error('nis') ?></label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                  <input type="text" class="form-control 7 col-xs-12" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" required/>
                              </div>
                            </div>
                            <div class="form-group row">
                                  <label class="col-md-2 offset-md-3" for="varchar">Nama Siswa <?php echo form_error('nama') ?></label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                  <input type="text" class="form-control 7 col-xs-12" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" required/>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <?php foreach ($id_th_akademik->result() as $row) {?>
                                  <input type="hidden" name="id_th_akademik" id="id_th_akademik" value="<?php echo $row->id_th_akademik ?>"required/>
                                <?php } ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 offset-md-3">Kelas </label>
                                    <div class="col-md-4 col-sm-9 col-xs-12">
                                        <select name="kelas" class="form-control" >
                                            <option disabled selected>-- Pilih Kelas --</option>
                                            <?php foreach ($kelas as $row) {?>
                                              <?php if($row->tingkat==10 || $row->tingkat==11 || $row->tingkat==12 ){ ?>
                                                <option value="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat, " ", $row->nama_kelas ?></option>
                                            <?php  }
                                             } ?>
                                        </select>
                                    </div>
                                    <?php echo form_error('kelas') ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 offset-md-3">Jenis Kelamin <?php echo form_error('jk'); ?></label>
                                <div class="col-md-4 col-sm-9 col-xs-12">
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
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo site_url('#') ?>" class="btn btn-default">Cancel</a>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Tambah Siswa <?php echo $nm_kls ?></h3>
                        </div>
                        <br><br><br>
                        <label class="col-md-7 offset-2" for="varchar">Tambahkan Siswa perkelas dengan excel <?php echo form_error('nis') ?></label>
                        <div class="col-md-7 offset-2">
                          <div class="form-group">
                            <?php echo form_open_multipart('excel_import2/import_siswa');?>
                            <div class="custom-file">
                          <input type="file" class="form-control" name="file">
                        </div>
                        <br><br>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="offset-4">
                            <button id="Upload" name="upload" type="Upload" class="btn btn-success">&nbsp&nbsp&nbspUpload &nbsp&nbsp&nbsp</button>
                          </div>
                      </div>
                      <br><br>
                    </div>

                    </div>
                  </div>

                    </div>
                  </div>
              </div>
      	</form>
</body>
