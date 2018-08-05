<div class="col-md-9">
  <div class="card direct-chat direct-chat-warning">
  <div class="card-header">
  <h3 class="card-title">Direct Chat</h3>

  <div class="card-tools">

  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
  </button>
  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
  </button>
  </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <!-- Conversations are loaded here -->
  <div class="direct-chat-messages">
  <!-- Message. Default to the left -->
  <div class="direct-chat-msg">
<!--diualng disini -->

    <div class="direct-chat-info clearfix">

      <span class="direct-chat-name float-left"><?php
      if (empty($pesan))
      {}
      else
      {
        echo "Bendahara";
      }
       ?></span>

      <span class="direct-chat-timestamp float-right"><?php
      if (empty($data))
      {}
      else
      {
          $hit=count($pesan); print_r($pesan[--$hit]->tgl) ;
      }
       ?></span>
<?php foreach($pesan as $row){?>
    </div>
    <div class="direct-chat-text">

        <?php echo $row->isi_pesan;
      }
      ?>
    </div>

    <!-- sampe sini -->
  </div>
  <!-- /.direct-chat-msg -->

  <!-- /.direct-chat-msg -->

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <div class="card-footer">

                  <div class="input-group">
                    <a href="<?php echo base_url('spp_siswa/hapus_pesan/'.$this->session->userdata('id_user')) ?>" class="btn btn-danger"><b>Hapus</b></a>
                  </div>

              </div>
  </div>
  <!-- /.card-footer-->
  </div>
  </div>

</div>
