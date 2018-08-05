<div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Kenaikan Kelas</h3>
                </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo $action ?>" method="post">
                      <div class="card-body">
                        <div class="form-group row">
                              <label class="col-md-3 offset-md-2" for="varchar">Tahun Aktif Sekarang </label>
                              <?php foreach($th_aktif->result() as $row){ ?>
                                <div class="col-md-3">
                              <input type="varchar" class="form-control" name="th_aktif" id="th_aktif"  value="<?php echo $row->tahun;?>-<?php
                              if ($row->semester==1) {
                                echo "Ganjil";
                                }else {
                                echo "Genap";
                              }
                               ?>" disabled>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 offset-md-2"> Naik Kelas Tahun akademik</label>
                                <div class="col-md-3">
                                    <select name="id_th_akademik" class="form-control">
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
                              <?php echo form_error('id_th_akademik'); ?>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 1 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A1" value="k1">
                            <select name="br_10A1" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa1 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 2 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A2" value="k19">
                            <select name="br_10A2" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa2 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 3 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A3" value="k9">
                            <select name="br_10A3" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa3 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 4 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A4" value="k10">
                            <select name="br_10A4" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa4 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 5 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A5" value="k11">
                            <select name="br_10A5" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa5 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 6 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A6" value="k12">
                            <select name="br_10A6" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa6 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 7 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A7" value="k13">
                            <select name="br_10A7" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa7 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 8 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A8" value="k14">
                            <select name="br_10A8" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa8 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 MIPA 9 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10A9" value="k16">
                            <select name="br_10A9" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ipa9 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 IPS 1 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10S1" value="k2">
                            <select name="br_10S1" class="form-control">
                  							<option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ips1 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 offset-md-2">Kelas 10 IPS 2 pindah ke kelas</label>
                          <div class=" col-md-3">
                            <input type="hidden" name="lm_10S2" value="k17">
                            <select name="br_10S2" class="form-control">
                                <option disabled selected>-- Pilih Kelas --</option>
                                <?php foreach ($kls10ips2 as $row) {?>
                                <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <?php echo form_error('br_10A1') ?>
                        </div>

                    <!--kelas 11-->
        					  <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 1 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A1" value="k3">
                      <div class=" col-md-3">
                        <select name="br_11A1" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa1 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 2 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A2" value="k19">
                      <div class=" col-md-3">
                        <select name="br_11A2" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa2 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 3 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A3" value="k18">
                      <div class=" col-md-3">
                        <select name="br_11A3" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa3 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 4 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A4" value="k24">
                      <div class=" col-md-3">
                        <select name="br_11A4" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa4 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 5 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A5" value="k25">
                      <div class=" col-md-3">
                        <select name="br_11A5" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa5 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 6 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A6" value="k26">
                      <div class=" col-md-3">
                        <select name="br_11A6" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa6 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 7 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A7" value="k27">
                      <div class=" col-md-3">
                        <select name="br_11A7" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa7 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 8 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A8" value="k28">
                      <div class=" col-md-3">
                        <select name="br_11A8" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa8 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 MIPA 9 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11A9" value="k29">
                      <div class=" col-md-3">
                        <select name="br_11A9" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ipa9 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 IPS 1 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11S1" value="k4">
                      <div class=" col-md-3">
                        <select name="br_11S1" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ips1 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 11 IPS 2 pindah ke kelas<?php echo form_error('id_kelas2') ?></label>
                      <input type="hidden" name="lm_11S2" value="k20">
                      <div class=" col-md-3">
                        <select name="br_11S2" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls11ips2 as $row){?>
                              <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->tingkat.' '.$row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_11A1') ?>
                    </div>

                    <!--kelas 12 -->
        					  <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 1 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A1" value="k5">
                      <div class=" col-md-3">
                        <select name="br_12A1" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 2 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A2" value="k23">
                      <div class=" col-md-3">
                        <select name="br_12A2" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 3 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A3" value="k22">
                      <div class=" col-md-3">
                        <select name="br_12A3" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 4 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A4" value="k21">
                      <div class=" col-md-3">
                        <select name="br_12A4" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 5 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A5" value="k31">
                      <div class=" col-md-3">
                        <select name="br_12A5" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 6 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A6" value="k32">
                      <div class=" col-md-3">
                        <select name="br_12A6" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 7 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A7" value="k33">
                      <div class=" col-md-3">
                        <select name="br_12A7" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 8 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A8" value="k34">
                      <div class=" col-md-3">
                        <select name="br_12A8" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPA 9 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12A9" value="k35">
                      <div class=" col-md-3">
                        <select name="br_12A9" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ipa as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPS 1 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12S1" value="k6">
                      <div class=" col-md-3">
                        <select name="br_12S1" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ips as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
                    </div>
                    <div class="  form-group row">
                      <label class=" col-md-3 offset-md-2">Kelas 12 IPS 2 pindah ke kelas<?php echo form_error('id_kelas3') ?></label>
                      <input type="hidden" name="lm_12S2" value="k30">
                      <div class=" col-md-3">
                        <select name="br_12S2" class="form-control">
                          <option disabled selected>-- Pilih Kelas --</option>
                          <?php foreach($kls12ips as $row){?>
                            <option value ="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <?php echo form_error('br_12A1') ?>
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
