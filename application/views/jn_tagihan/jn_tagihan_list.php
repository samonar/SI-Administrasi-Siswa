<div style="margin-top: 4px" class="text-center" id="message">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div>

<table class="table table-bordered table-striped" id="mytable">
    <thead>
        <tr>
            <th>no</th>
            <th>Jenis Tagihan</th>
            <th>action</th>
           
        </tr>
    </thead>
    
    <tbody>
    <?php
        $start = 0;
        foreach ($jn_tagihan_data as $jn_tagihan){
    ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $jn_tagihan->jn_tagihan; ?></td>
                <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('jn_tagihan/read/'.$jn_tagihan->id_jn_tagihan),'Read'); 
                echo ' | '; 
                echo anchor(site_url('jn_tagihan/update/'.$jn_tagihan->id_jn_tagihan),'Update'); 
                echo ' | '; 
                echo anchor(site_url('jn_tagihan/delete/'.$jn_tagihan->id_jn_tagihan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
            </tr>

    <?php
        }
    ?>
    <?php echo anchor(site_url('jn_tagihan/create'),'Create', 'class="btn btn-primary"'); ?>
    
    </tbody>
</table>