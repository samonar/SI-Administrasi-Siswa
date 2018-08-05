<div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Tambah Jenis Tagihan</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo $action ?>" method="post">
                      <div class="card-body">
                        <div class="form-group row">
                              <label class="col-md-2 offset-md-2" for="varchar">Jenis Tagihan</label>
                                <div class="col-md-3">
                              <input type="varchar" class="form-control" name="jn_tagihan" id="jn_tagihan"  value="" required>
                              <?php echo form_error('jn_tagihan') ?>
                            </div>
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
