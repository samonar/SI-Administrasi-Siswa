       <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Welcome
                </h3>
              </div>
              <div class="card-body">
                <h1 align=center class="headline text-black" style="margin-top:50px">Selamat Datang <?php echo $this->session->userdata('username') ?></h2>
                <h1 align=center class="headline text-green" style="margin-top:-4px"></h2>
                <h4 align=center class="headline text-green" style="margin-bottom: 22px;">
                  <?php
                    // setting timezone
                    date_default_timezone_set('Asia/Jakarta');
                    /* script menentukan hari */
                     $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                     $hr = $array_hr[date('N')];

                    /* script menentukan tanggal */
                    $tgl= date('j');
                    /* script menentukan bulan */
                      $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                      $bln = $array_bln[date('n')];
                    /* script menentukan tahun */
                    $thn = date('Y');
                    /* script perintah keluaran*/
                     echo $hr . ", " . $tgl . " " . $bln . " " . $thn;
                  ?>
                </h4>
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
