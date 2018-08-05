    <body>
   
        <table class="table">

        <tr><td>Id Tagihan Siswa Kelas</td><td><?php echo $id_tagihan_siswa_kelas; ?></td></tr>
        
	    <tr><td>Id Kelas Siswa</td><td><?php echo $id_kelas_siswa; ?></td></tr>
	    <tr><td>Id Tagihan</td><td><?php echo $id_jn_tagihan; ?></td></tr>
	    <tr><td>Id Pembayaran</td><td><?php echo $id_pembayaran; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Nominal</td><td><?php echo $nominal_tagihan; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tagihan_siswa_kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>