
 <div style="margin-top: 4px" class="text-center" id="message">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div>
    
    <table class="table table-bordered table-striped" id="mytable">
    <thead>
       <tr>
            <th>No</th> 
            <th>id</th>      
            <th>Nis</th>
            <th>Nama Siswa</th>
            <th>Tingkat</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Tahun Akademik</th>
            <th>Action</th>
        </tr>
    </thead>

     <tbody>
         <?php
            $start = 0;
            foreach ($kelas_siswa_data as $kelas_siswa)
            {
                ?>
        <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $kelas_siswa->id_kelas_siswa ?></td>
            <td><?php echo $kelas_siswa->nis ?></td>
            <td><?php echo $kelas_siswa->nama_siswa ?></td>
            <td><?php echo $kelas_siswa->tingkat ?></td>
            <td><?php echo $kelas_siswa->nama_kelas ?></td>
            <td><?php echo $kelas_siswa->semester ?></td>
            <td><?php echo $kelas_siswa->tahun ?></td>
            <td style="text-align:center" width="200px">
                <?php 
               
                echo anchor(site_url('kelas_siswa/reads/'.$kelas_siswa->id_kelas_siswa),'Read'); 
                echo ' | '; 
                echo anchor(site_url('kelas_siswa/update/'.$kelas_siswa->id_kelas_siswa),'Update'); 
                echo ' | '; 
                echo anchor(site_url('kelas_siswa/delete/'.$kelas_siswa->id_kelas_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
    </tbody>      
    </table>
    <div class="col-md-4">
                <?php echo anchor(site_url('kelas_siswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>