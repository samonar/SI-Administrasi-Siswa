			
			
			<!-- Menu Tagihan -->
			<li class="<?php if($page_header=='Tagihan'){?> active <?php } ?> treeview">
			  <a href="#"><i class="fa fa-book"></i> <span>Tagihan</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			  </a>
			  <ul class="treeview-menu">
				<li <?php if($active=='jn tagihan'){?> class="active" <?php } ?> ><a href="<?php echo site_url('tagihan_siswa_kelas/buat_tagihan') ?>"><i class="fa fa-sign-in"></i>Cek Tagihan</a></li>
			  </ul>
			  <ul class="treeview-menu">
				<li <?php if($active=='Tagihan'){?> class="active" <?php } ?> ><a href="<?php echo site_url('tagihan_siswa_kelas') ?>"><i class="fa fa-sign-in"></i>Tagihan Seluruh Siswa </a></li>
			  </ul>
			  <ul class="treeview-menu">
				<li <?php if($active=='GenTagihan'){?> class="active" <?php } ?> ><a href="<?php echo site_url('tagihan_siswa_kelas/genTagihan') ?>"><i class="fa fa-sign-in"></i>Generate Tagihan </a></li>
			  </ul>
			   
			</li>
			  

			<!--Menu Siswa Kelas -->
			<li class="<?php if($page_header=='Siswa'){?> active <?php } ?> treeview">
			  <a href="#"><i class="fa fa-book"></i> <span>Siswa</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			  </a>
			  
			 <!-- <ul class="treeview-menu">
				<li <?php if($active=='Siswa'){?> class="active" <?php } ?> ><a href="<?php echo site_url('kelas_siswa') ?>"><i class="fa fa-sign-in"></i>registrasi siswa</a></li>
			  </ul>-->
			  <ul class="treeview-menu">
				<li <?php if($active=='Siswa'){?> class="active" <?php } ?> ><a href="<?php echo site_url('siswa') ?>"><i class="fa fa-sign-in"></i>Master Siswa</a></li>
			  </ul>
			</li>
			

			
						
	