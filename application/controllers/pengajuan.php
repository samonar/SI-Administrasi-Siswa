<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model','Pengajuan_keringanan_model'));
      $this->load->library(array('form_validation','upload','image_lib','template','session'));
      $this->load->helper(array('form', 'url', 'html'));

      $session_login=$this->session->userdata('logged_in');
      $user_data=$this->User_model->get_by_id($this->session->userdata('nik'));
      $cek=$this->session->userdata('nama_jabatan');

      $session_jabatan=$this->session->userdata('nama_jabatan');
      if($session_jabatan=='siswa'){
          redirect('user');
      }
    }

    public function view_pengajuan()
    {
      $data = array(
        'list_pengajuan' =>$this->Pengajuan_keringanan_model->get_all(),
        'page_header'           => 'keringanan', //judul halaman
        'active'                => 'daftar pengajuan',
      );
      $this->template->display('pengajuan/list_pengajuan',$data);
    }

    public function update_terima($ubah,$id,$nominal)
    {
      $this->Pengajuan_keringanan_model->update_terima($id,$ubah);
      $data = array('nominal_tagihan' =>$nominal , );
      $this->Tagihan_siswa_kls_model->update($id,$data);
      redirect('pengajuan/view_pengajuan');
    }
    public function update_tolak($ubah,$id)
    {
      $this->Pengajuan_keringanan_model->update_tolak($id,$ubah);
      redirect('pengajuan/view_pengajuan');
    }

}
 ?>
