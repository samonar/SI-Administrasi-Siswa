    <form action="<?php echo $action ?>" method="post" class="form" novalidate="">
        <div class="form-group row">
            <label class="col-md-2 offset-md-3">Semester Aktif<?php echo form_error('th_aktif') ?> </label>
            <?php foreach($th_aktif->result() as $row){ ?>
              <div class="col-md-4">
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
          <input type="hidden" class="form-control" name="semester" id="semester"  value="<?php echo $row->semester;?>">
        </div>

        <div class="form-group row">
            <label class="col-md-2 offset-md-3">Tingkat <?php echo form_error('kelas') ?></label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                    <select name="kelas" class="form-control">
                        <option disabled="" selected="">-- Pilih Tingkat --</option>
                        <?php foreach ($kelas as $row) {?>
                        <option value="<?php echo $row->tingkat ?>" <?php echo set_select('tahun', $row->tingkat); ?>><?php if ($row->tingkat==10) {
                            echo "Kelas 10";
                        }elseif ($row->tingkat==11) {
                            echo "Kelas 11";
                        }else{echo "Kelas 12";} ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 offset-md-3">Biaya Pendidikan<?php echo form_error('jn_tagihan') ?></label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                    <select name="jn_tagihan" class="form-control">
                        <option disabled="" selected="">-- Pilih Biaya Pendidikan --</option>
                        <?php foreach($jn_tagihan as $row){ ?>
                        <option value="<?php echo $row->id_jn_tagihan ?>" <?php echo set_select('jn_tagihan', $row->jn_tagihan); ?>><?php echo $row->jn_tagihan ?></option>
                      <?php }?>
                    </select>
                </div>
                    <a href="<?php echo base_url('jn_tagihan/create'); ?>">
                    <button type="button" class="btn btn-info"><i class="fa fa-plus-square">&nbsp; Tambah</i></button>
                        </a>
        </div>

        <div class="form-group row">
            <label class="col-md-2 offset-md-3" for="name">Nominal <?php echo form_error('nominal') ?> <span class="required"></span>
                        </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <input id="nominal" class="form-control col-md-9 col-xs-12" name="nominal" required="required" type="text" value="" onkeypress="if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                </div>
        </div>

        <!-- <div class="form-group row">
            <label class="col-md-2 offset-md-3" for="bulan">Bulan <?php echo form_error('bulan') ?></label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                            <div class="checkbox">
                                  <p>
                                    <table>
                                        <?php foreach($th_aktif->result() as $row)
                                        if ($row->semester==2) {?>
                                             <tr>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="1" <?php if ($bulan == '1') echo 'checked="checked"'; ?> />Januari </td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="2" <?php if ($bulan == '2') echo 'checked="checked"'; ?> />Februari </td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="3" <?php if ($bulan == '3') echo 'checked="checked"'; ?> />Maret</td>
                                    
                                    </tr>
                                    
                                    <tr>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="4" <?php if ($bulan == '4') echo 'checked="checked"'; ?> />April</td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="5" <?php if ($bulan == '5') echo 'checked="checked"'; ?> />Mei </td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="6" <?php if ($bulan == '6') echo 'checked="checked"'; ?> /> Juni </td>
                                    </tr>

                                <?php } else { ?>
                                    <tr>
                                    
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="7" <?php if ($bulan == '7') echo 'checked="checked"'; ?> />Juli</td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="8" <?php if ($bulan == '8') echo 'checked="checked"'; ?> /> Agustus</td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="9" <?php if ($bulan == '9') echo 'checked="checked"'; ?> />September</td>
                                    </tr>

                                    <tr>
                                    
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="10" <?php if ($bulan == '10') echo 'checked="checked"'; ?> /> Oktober</td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="11" <?php if ($bulan == '11') echo 'checked="checked"'; ?> />November</td>
                                    <td height="30px"><input type="checkbox" class="flat-red" name="bulan[]" value="12" <?php if ($bulan == '12') echo 'checked="checked"'; ?> />Desember</td>

                                    </tr>

                                <?php } ?>
                                   
                                    
                                    </table>
                                  </p>
                            </div>
                </div>
        </div> -->
                        <input type="hidden" name="id_tagihan_bulanan" value="<?php echo $id_tagihan_bulanan ?>">

                      <div class="form-group">
                        <div class="col-md-6 offset-5">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
