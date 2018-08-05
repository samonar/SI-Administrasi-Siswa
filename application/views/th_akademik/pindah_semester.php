<div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Pindah Semester</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="update_action" method="post">
                      <div class="card-body">
                        <div class="form-group row">
                              <label class="col-md-2 offset-md-2" for="varchar">Tahun Aktif Sekarang </label>
                              <?php foreach($th_aktif->result() as $row){ ?>
                                <div class="col-md-3">
                              <input type="varchar" class="form-control" name="th_aktif" id="th_aktif"  value="<?php echo $row->tahun;?>-<?php
                              if ($row->semester==1) {
                                echo "Ganjil";
                                }else {
                                echo "Genap";
                              }
                               ?>" disabled>
                              <?php echo form_error('tahun') ?>
                              <input type="hidden" class="form-control" name="th_aktif" id="th_aktif"  value="<?php echo $row->id_th_akademik;?>">
                              <input type="hidden" class="form-control" name="semester"  value="<?php echo $row->semester;?>">
                            </div>
                            <?php } ?>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 offset-md-2">Tahun akademik
                            </label>
                                <div class="col-md-3">
                                    <select required name="id_th_akademik" class="form-control" >
                                        <option disabled selected>--Pilih Semester Aktif --</option>
                                        <?php foreach($id_th_akademik->result() as $row){ ?>
                                        <option value="<?php echo $row->id_th_akademik ?>" <?php echo set_select('id_th_akademik', $row->id_th_akademik); ?>> <?php echo $row->tahun?> - <?php
                                        if ($row->semester==1) {
                                          echo "Ganjil";
                                        }else {
                                          echo "Genap";
                                        }
                                         ?>
                                        </option>
                                      <?php } ?>

                                    </select>
                                </div>
                                <a href="create">
                                <button type="button" class="btn btn-info btn-primary"><i class="fa fa-plus-square">&nbsp; Tambah</i></button>
                              </a><?php echo form_error('id_th_akademik'); ?>
                        </div>

                      </div>
                      <!-- /.card-body -->
                      <div class="form-group row">
                      <div class="col-md-2 offset-4">
                        <button id="send" type="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </div>

                    </form>
              </div>
