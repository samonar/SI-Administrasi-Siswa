<div class="col-md-9">
  <div class="card direct-chat direct-chat-warning">
    <div class="card-header row">
    <h3 class="card-title">Pesan Pemberitahuan</h3>
    <h6 class="col-md-4 offset-md-1" style="font-weight:  bold;"><?php echo $this->session->userdata('message') ?></h6>
    </div>
  <!-- /.card-header -->
  <form role="form" action="<?php echo $action; ?>" method="post" >
    <div class="card-body">
    <!-- Conversations are loaded here -->
      <div class="direct-chat-messages">
        <div class="form-group">
          <textarea class="form-control" name="isi_pesan" rows="8" placeholder="Enter ..."></textarea>
        </div>
      </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="card-footer">
        <div class="input-group">
          <button type="submit" name="upload" class="btn btn-success">Kirim</button>
        </div>
      </div>
    </div>
  </form>
    </div>
  </div>

</div>
