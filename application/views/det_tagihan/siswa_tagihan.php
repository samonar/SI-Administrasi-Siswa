<div id="content" class="span10" style="min-height: 412px;">
			
	
			 <table class="table table-bordered table-striped">
							<tbody><tr>
								<td><h4>Nama Siswa</td>
								<td><h4><?php echo $nama ; ?></td>
							</tr>
							<tr>
								<td><h4>Alamat</td>
								<td><h4><?php echo $alamat; ?></td>
							</tr>
							<tr>
								<td><h4>No Hp</td>
								<td><h4><?php echo $no_hp ?></td>
							</tr>
							
							
							
						</tbody></table><div class="row-fluid">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon hand-top"></i><span class="break"></span>Kartu SPP Tahun Ajaran 2016/2017</h2>
					</div>
					<div class="box-body">
						<?php
					        $start = 0;
					        $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','agustus', 'September','Oktober','November','Desember');
					        foreach ($det_tagihan_model_data as $det_tagihan){
					        	 foreach ($bulan as $index => $nama_bulan){
					        		if ($det_tagihan->bulan==$index){
					    ?>
						<div class="col-md-2" >
							<a href="" class="quick-button span2"><i class="fa fa-list-alt"></i>
							<p><?php echo $nama_bulan ?></p><span class="notification green"></span><span class="label">Rp.<?php echo $det_tagihan->nominal ?> </span></a>
						</div>
						<?php 
									} 
								}
							}
					?>
					</div>
					
</div>

</div>