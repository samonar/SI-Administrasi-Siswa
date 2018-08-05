<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
   body {
  margin: 10px;
  width: 700px;
  height: 374px;
  float: left;
  position: relative;
}
.no {
	position: absolute;
  bottom: 273px;
  left: 130px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 16px Arial;
}
.penerima {
	position: absolute;
  bottom: 255px;
  left: 224px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 13px Arial;
}
.terbilang {
	position: absolute;
  bottom: 226px;
  left: 242px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 13px Arial;
}
.pembayaran {
	position: absolute;
  bottom: 206px;
  left: 226px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 13px Arial;
}
.tgl {
	position: absolute;
  bottom: 153px;
  left: 497px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 15px Arial;
}
.rp {
	position: absolute;
  bottom: 111px;
  left: 177px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 18px Arial;
  font-weight: bold;
}
.bendahara {
	position: absolute;
  bottom: 101px;
  left: 526px;
  padding: 4px 8px;
  color: black;
  margin: 0;
  font: 16px Arial;
}

  </style>
</head>
<body>
  <!-- In production server. If you choose this, then comment the local server and uncomment this one-->
  <!-- <img src="<?php // echo $_SERVER['DOCUMENT_ROOT']."/media/dist/img/no-signal.png"; ?>" alt=""> -->
  <!-- In your local server -->
  <img src="C:/xampp/htdocs/sppb/assets/dist/img/kwitansi.jpg" style="width:700px;height:340px;">
  <!--<img src="<?php echo base_url()?>assets/dist/img/kwitansi.jpg" style="width:700px;height:340px;">-->
  <div class="module">
 <div class="no"><?php echo $data_tagihan->id_pembayaran ?></div>
 <div class="penerima"><?php echo $data_tagihan->nama_siswa ?></div>
 <div class="terbilang"><?php echo $pembilang ?></div>
 <?php $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');
 foreach ($bulan as $index => $nama_bulan) {
   if ($data_tagihan->bulan==$index) {?>
         <div class="pembayaran"><?php echo $data_tagihan->jn_tagihan.' Bulan '.$nama_bulan  ?></div>
   <?php }
 }?>
 <div class="tgl"><?php echo $data_tagihan->date ?></div>
 <div class="rp"><?php echo $data_tagihan->nominal_tagihan ?></div>
 <div class="bendahara">Dewi Sri</div>
</div>
</body>
</html>
