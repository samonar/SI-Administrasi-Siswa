<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class spp_siswa extends CI_Controller
{
    function __construct()
    {
         parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model','Th_akademik_model','Pesan_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));

        $session_login=$this->session->userdata('logged_in');
        $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='siswa'){
            redirect('user');
        }
    }

    function index()
    {
      $nis= $this->session->userdata('id_user');
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);
      $pesan= $this->User_model->pesan($nis)->row();

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
                'pembayaran' =>$this->Pembayaran_model->get_by_nis($nis),
                'page_header'                => 'kelas',
                'pesan' => $pesan,
              );
        $data['active']='kelas'.$data['nama']->id_kelas;
        $data['content'] = 'view_siswa/beranda_siswa';
      $this->load->view('template_siswa/index', $data);
    }

    public function detail_tagihan()
    {
      $nis= $this->session->userdata('id_user');
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);
      $pesan= $this->User_model->pesan($nis)->row();

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
                'pembayaran' =>$this->Pembayaran_model->get_by_nis($nis),
                'page_header'                => 'kelas',
                'pesan' => $pesan,
              );
        $data['active']='kelas'.$data['nama']->id_kelas;
        $data['content'] = 'view_siswa/detail_tagihan';
      $this->load->view('template_siswa/index', $data);
    }
    public function detail_pembayaran()
    {
      $nis= $this->session->userdata('id_user');
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);
      $pesan= $this->User_model->pesan($nis)->row();

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
                'pembayaran' =>$this->Pembayaran_model->get_by_nis($nis),
                'page_header'                => 'kelas',
                'pesan' => $pesan,
              );
        $data['active']='kelas'.$data['nama']->id_kelas;
        $data['content'] = 'view_siswa/detail_pembayaran';
      $this->load->view('template_siswa/index', $data);
    }
    public function pesan()
    {
      $nis= $this->session->userdata('id_user');
      $det_tagihan = $this->Tagihan_siswa_kls_model->tghTiapKelas($nis);
      $pesan= $this->Pesan_model->cr_pesan($nis)->result();

              $data = array(
                'data_tagihan'=> $det_tagihan,
                'nama' => $this->Siswa_model->biodata_siswa($nis),
                'totTagihan' => $this->Tagihan_siswa_kls_model->totTagihan($nis)->row(),
                'pembayaran' =>$this->Pembayaran_model->get_by_nis($nis),
                'page_header'                => 'kelas',
                'pesan' => $pesan,
              );
        $data['active']='kelas'.$data['nama']->id_kelas;
        $data['content'] = 'view_siswa/pesan';
      $this->load->view('template_siswa/index', $data);
    }

    function logout(){
  		$this->session->sess_destroy();
  		redirect(site_url('user'));
  	}

    public function hapus_pesan($nis)
    {
      $this->Pesan_model->delete($nis);
      redirect(site_url('spp_siswa/pesan'));
    }
}

?>
