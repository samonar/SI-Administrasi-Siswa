<section class="content col-md-9">
  <h2 align=center style="margin-top:100px;font-size: 40px;line-height: 40px;">Selamat Datang</h2>
  <h2 align=center style="margin-top:10px;font-size: 20px;line-height: 40px;"><?php echo $nama->nama_siswa ?></h2>
  <h4 align=center style="margin-top:10px;font-size: 20px;line-height: 20px;">
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
</section>
