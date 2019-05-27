<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas_siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model','Th_akademik_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));

        $session_login=$this->session->userdata('logged_in');
        $user_data=$this->User_model->get_by_id($this->session->userdata('nik'));
        $cek=$this->session->userdata('nama_jabatan');
      $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='admin TU'){
            redirect('user');
        }

    }

    public function index()
    {
        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);

        $kelas_siswa = $this->Kelas_siswa_model->get_siswa();

                    $data = array(
                        'kelas_siswa_data'=> $kelas_siswa,
                        'button' => 'Presensi Pulang',
                        'action' => site_url('absensi/finish_action'),
                        'class'  => 'fa fa-sign-out',
                        'keterangan_header'     => 'Daftar Siswa',
                        'page_header'           => 'Siswa',
                        'menu2'                 => false,
                        'page_header2'          => '',
                        'active'                => 'Lihat Data Tagihan',
                        'icon_header'           => 'fa-book',
                        'icon_header2'          => '',
                        'icon_active'           => 'fa-sign-in',
                        'deskripsi_page_header' => '',
                        'user_image'            => $user_data->image,
                        'nama'             => $user_data->nama_admin,
                        'user_jabatan'          => $user_data->jabatan,
        );
        $this->template->display('kelas_siswa/kelas_siswa_list1', $data);
    }
     public function index2()
    {
        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);

        $kelas_siswa = $this->Kelas_siswa_model->get_siswa();

                    $data = array(
                        'kelas_siswa_data'=> $kelas_siswa,
                        'button' => 'Presensi Pulang',
                        'action' => site_url('absensi/finish_action'),
                        'class'  => 'fa fa-sign-out',
                        'keterangan_header'     => 'Daftar Siswa',
                        'page_header'           => 'Siswa',
                        'menu2'                 => false,
                        'page_header2'          => '',
                        'active'                => 'Lihat Data Tagihan',
                        'icon_header'           => 'fa-book',
                        'icon_header2'          => '',
                        'icon_active'           => 'fa-sign-in',
                        'deskripsi_page_header' => '',
                        'user_image'            => $user_data->image,
                        'user_nama'             => $user_data->nama_admin,
                        'user_jabatan'          => $user_data->jabatan,
        );
        $this->template->display('kelas_siswa/kelas_siswa_list', $data);
    }

    public function read()
    {
        $nis =  $this->uri->segment(3);
        $id =  $this->uri->segment(4);

        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);
        $row = $this->Kelas_siswa_model->get_by_id($id);
        $det_tagihan = $this->Tagihan_siswa_kls_model->get_by_nis($nis);



        if ($det_tagihan) {
            $data = array(

        'det_tagihan_model_data'=> $det_tagihan,
        'class'  => 'fa fa-sign-out',
        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
        'menu2'                 => false,
        'page_header2'          => '',
        'active'                => 'Tagihan',
        'icon_header'           => 'fa-book',
        'icon_header2'          => '',
        'icon_active'           => 'fa-sign-in',
        'deskripsi_page_header' => '',

        'user_image'            => $user_data->image,
        'user_nama'             => $user_data->nama_admin,
        'user_jabatan'          => $user_data->jabatan,

        'id_kelas_siswa' => $row->id_kelas_siswa,
        'nis' => $row->nis,
        'id_kelas' => $row->id_kelas,
        'id_th_akademik' => $row->id_th_akademik,
        'nama' => $row->nama_siswa,
        'alamat'=> $row->alamat,
        'no_hp'=> $row->no_hp_wali,


        );
            //$this->template->display('kelas_siswa/kelas_siswa_read', $data);
            $this->template->display('det_tagihan/siswa_tagihan',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_siswa'));
        }
    }

    public function reads($id)
    {

        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);
        $row = $this->Kelas_siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
        'class'  => 'fa fa-sign-out',
        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
        'menu2'                 => false,
        'page_header2'          => '',
        'active'                => 'Tagihan',
        'icon_header'           => 'fa-book',
        'icon_header2'          => '',
        'icon_active'           => 'fa-sign-in',
        'deskripsi_page_header' => '',
        'user_image'            => $user_data->image,
        'user_nama'             => $user_data->nama_admin,
        'user_jabatan'          => $user_data->jabatan,
        'id_kelas_siswa' => $row->id_kelas_siswa,
       'nis'=>$row->nis,
        'id_kelas' => $row->id_kelas,
        'id_th_akademik' => $row->id_th_akademik,
        'nama' => $row->nama_siswa,
        'alamat'=> $row->alamat,
        'no_hp'=> $row->no_hp_wali,


        );
            //$this->template->display('kelas_siswa/kelas_siswa_read', $data);
            $this->template->display('kelas_siswa/kelas_siswa_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_siswa'));
        }
    }


    public function create($nm_kls)
    {
        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);
        $data = array(
            'nm_kls' => $nm_kls,
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
      	    'nis' => set_value('nis'),
            'id_th_akademik' => $this->Th_akademik_model->th_aktif(),
            'kelas' => $this->Kelas_model->get_all_exc(),
            'nama_siswa' => set_value('nama_siswa'),
            'id_virtual'=> set_value('id_virtual'),
            'jk' => set_value('jk'),
            'page_header'           => 'kelas', //judul halaman
            'active'                => '',

	      );
    $this->template->display('kelas_siswa/kelas_siswa_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'action' => site_url('siswa/create_action'),
    		'nis' => $this->input->post('nis',TRUE),
        'nama_siswa' => $this->input->post('nama_siswa',TRUE),
    		'id_kelas' => $this->input->post('kelas',TRUE),
    		'id_th_akademik'=>$this->input->post('id_th_akademik',TRUE),
        'jk' => set_value('jk'),
        'id_virtual' => set_value('id_virtual'),
	    );
        $cek=$this->Siswa_model->cek_siswa($data);
        $num=$cek->num_rows();
        if ($num>0) {
          echo "<script>alert('NIS sudah ada')</script>";
				  redirect ('kelas_siswa/create','refresh');
        }else {
          $this->template->display('siswa/siswa_form', $data);
          //echo $data['nama_siswa'];
        }
        //this->Kelas_siswa_model->insert($data);
        //$this->session->set_flashdata('message', 'Create Record Success');
        //redirect(site_url('kelas_siswa'));
        }
    }

    public function update($id)
    {

        $session_nik=$this->session->userdata('nik');
        $user_data=$this->User_model->get_by_id($session_nik);
        $row = $this->Kelas_siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
        'class'  => 'fa fa-sign-out',
        'keterangan_header'     => 'Tagihan Siswa',
        'page_header'           => 'Tagihan',
        'menu2'                 => false,
        'page_header2'          => '',
        'active'                => 'Tagihan',
        'icon_header'           => 'fa-book',
        'icon_header2'          => '',
        'icon_active'           => 'fa-sign-in',
        'deskripsi_page_header' => '',

        'user_image'            => $user_data->image,
        'user_nama'             => $user_data->nama_admin,
        'user_jabatan'          => $user_data->jabatan,

                'button' => 'Update',
                'action' => site_url('kelas_siswa/update_action'),
		'id_kelas_siswa' => set_value('id_kelas_siswa', $row->id_kelas_siswa),
		'nis' => set_value('nis', $row->nis),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'id_th_akademik' => set_value('id_th_akademik', $row->id_th_akademik),
	    );
            $this->template->display('kelas_siswa/kelas_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_siswa'));
        }
    }

    function naik_kelas()
    {
      $data = array(
        'action' => 'update_naik_kelas',
        'th_aktif' => $this->Th_akademik_model->th_aktif(),
        'id_th_akademik' =>$this->Th_akademik_model->get_all(),
        'kls10ipa1' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa2' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa3' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa4' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa5' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa6' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa7' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa8' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ipa9' => $this->Kelas_model->cari_kelas('11','IPA'),
        'kls10ips1' => $this->Kelas_model->cari_kelas('11','IPS'),
        'kls10ips2' => $this->Kelas_model->cari_kelas('11','IPS'),

        'kls11ipa1' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa2' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa3' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa4' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa5' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa6' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa7' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa8' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ipa9' => $this->Kelas_model->cari_kelas('12','IPA'),
        'kls11ips1' => $this->Kelas_model->cari_kelas('12','IPS'),
        'kls11ips2' => $this->Kelas_model->cari_kelas('12','IPS'),

        'kls12ipa' => $this->Kelas_model->cari_kelas('0','Lulus'),
        'kls12ips' => $this->Kelas_model->cari_kelas('0','Lulus'),
        'page_header'           => 'kenaikan kelas', //judul halaman
        'active'                => '',
      );

      $this->template->display('kelas_siswa/naik_kelas',$data);
    }

    public function update_naik_kelas()
    {
        $this->_rules_naikKelas();

        if ($this->form_validation->run() == FALSE) {
            $this->naik_kelas($this->input->post('id_kelas_siswa', TRUE));
            //echo "salah";
        } else {
            $data= array(
            'id_th_akademik' => $this->input->post('id_th_akademik',TRUE),
            '10A1_lama' => $this->input->post('lm_10A1',TRUE),
            '10A1_baru' => $this->input->post('br_10A1',TRUE),
            '10A2_lama' => $this->input->post('lm_10A2',TRUE),
            '10A2_baru' => $this->input->post('br_10A2',TRUE),
            '10A3_lama' => $this->input->post('lm_10A3',TRUE),
            '10A3_baru' => $this->input->post('br_10A3',TRUE),
            '10A4_lama' => $this->input->post('lm_10A4',TRUE),
            '10A4_baru' => $this->input->post('br_10A4',TRUE),
            '10A5_lama' => $this->input->post('lm_10A5',TRUE),
            '10A5_baru' => $this->input->post('br_10A5',TRUE),
            '10A6_lama' => $this->input->post('lm_10A6',TRUE),
            '10A6_baru' => $this->input->post('br_10A6',TRUE),
            '10A7_lama' => $this->input->post('lm_10A7',TRUE),
            '10A7_baru' => $this->input->post('br_10A7',TRUE),
            '10A8_lama' => $this->input->post('lm_10A8',TRUE),
            '10A8_baru' => $this->input->post('br_10A8',TRUE),
            '10A9_lama' => $this->input->post('lm_10A9',TRUE),
            '10A9_baru' => $this->input->post('br_10A9',TRUE),
            '10S1_lama' => $this->input->post('lm_10S1',TRUE),
            '10S1_baru' => $this->input->post('br_10S1',TRUE),
            '10S2_lama' => $this->input->post('lm_10S2',TRUE),
            '10S2_baru' => $this->input->post('br_10S2',TRUE),

            '11A1_lama' => $this->input->post('lm_11A1',TRUE),
            '11A1_baru' => $this->input->post('br_11A1',TRUE),
            '11A2_lama' => $this->input->post('lm_11A2',TRUE),
            '11A2_baru' => $this->input->post('br_11A2',TRUE),
            '11A3_lama' => $this->input->post('lm_11A3',TRUE),
            '11A3_baru' => $this->input->post('br_11A3',TRUE),
            '11A4_lama' => $this->input->post('lm_11A4',TRUE),
            '11A4_baru' => $this->input->post('br_11A4',TRUE),
            '11A5_lama' => $this->input->post('lm_11A5',TRUE),
            '11A5_baru' => $this->input->post('br_11A5',TRUE),
            '11A6_lama' => $this->input->post('lm_11A6',TRUE),
            '11A6_baru' => $this->input->post('br_11A6',TRUE),
            '11A7_lama' => $this->input->post('lm_11A7',TRUE),
            '11A7_baru' => $this->input->post('br_11A7',TRUE),
            '11A8_lama' => $this->input->post('lm_11A8',TRUE),
            '11A8_baru' => $this->input->post('br_11A8',TRUE),
            '11A9_lama' => $this->input->post('lm_11A9',TRUE),
            '11A9_baru' => $this->input->post('br_11A9',TRUE),
            '11S1_lama' => $this->input->post('lm_11S1',TRUE),
            '11S1_baru' => $this->input->post('br_11S1',TRUE),
            '11S2_lama' => $this->input->post('lm_11S2',TRUE),
            '11S2_baru' => $this->input->post('br_11S2',TRUE),

            '12A1_lama' => $this->input->post('lm_12A1',TRUE),
            '12A1_baru' => $this->input->post('br_12A1',TRUE),
            '12A2_lama' => $this->input->post('lm_12A2',TRUE),
            '12A2_baru' => $this->input->post('br_12A2',TRUE),
            '12A3_lama' => $this->input->post('lm_12A3',TRUE),
            '12A3_baru' => $this->input->post('br_12A3',TRUE),
            '12A4_lama' => $this->input->post('lm_12A4',TRUE),
            '12A4_baru' => $this->input->post('br_12A4',TRUE),
            '12A5_lama' => $this->input->post('lm_12A5',TRUE),
            '12A5_baru' => $this->input->post('br_12A5',TRUE),
            '12A6_lama' => $this->input->post('lm_12A6',TRUE),
            '12A6_baru' => $this->input->post('br_12A6',TRUE),
            '12A7_lama' => $this->input->post('lm_12A7',TRUE),
            '12A7_baru' => $this->input->post('br_12A7',TRUE),
            '12A8_lama' => $this->input->post('lm_12A8',TRUE),
            '12A8_baru' => $this->input->post('br_12A8',TRUE),
            '12A9_lama' => $this->input->post('lm_12A9',TRUE),
            '12A9_baru' => $this->input->post('br_12A9',TRUE),
            '12S1_lama' => $this->input->post('lm_12S1',TRUE),
            '12S1_baru' => $this->input->post('br_12S1',TRUE),
            '12S2_lama' => $this->input->post('lm_12S2',TRUE),
            '12S2_baru' => $this->input->post('br_12S2',TRUE),
        	  );

            $cekth=$this->Th_akademik_model->cek_th_aktif($data);
            $num=$cekth->num_rows();

            if ($num>0) {
              echo "<script>alert('Tahun akademik sama')</script>";
				      redirect ('kelas_siswa/naik_kelas','refresh');
            }else {
              $cari10A1=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A1_lama']);
              foreach ($cari10A1->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A1_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A2=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A2_lama']);
              foreach ($cari10A2->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A2_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A3=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A3_lama']);
              foreach ($cari10A3->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A3_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A4=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A4_lama']);
              foreach ($cari10A4->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A4_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A5=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A5_lama']);
              foreach ($cari10A5->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A5_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A6=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A6_lama']);
              foreach ($cari10A6->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A6_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A7=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A7_lama']);
              foreach ($cari10A7->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A7_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A8=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A8_lama']);
              foreach ($cari10A8->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A8_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10A9=$this->Kelas_siswa_model->cari_siswa_kelas($data['10A9_lama']);
              foreach ($cari10A9->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10A9_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10S1=$this->Kelas_siswa_model->cari_siswa_kelas($data['10S1_lama']);
              foreach ($cari10S1->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10S1_baru'],$data['id_th_akademik'],$nis);
              };
              $cari10S2=$this->Kelas_siswa_model->cari_siswa_kelas($data['10S2_lama']);
              foreach ($cari10S2->result() as $row) {
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['10S2_baru'],$data['id_th_akademik'],$nis);
              };

              //kelas 11
              $cari11A1=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A1_lama']);
              foreach ($cari11A1->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A1_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A2=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A2_lama']);
              foreach ($cari11A2->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A2_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A3=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A3_lama']);
              foreach ($cari11A3->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A3_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A4=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A4_lama']);
              foreach ($cari11A4->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A4_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A5=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A5_lama']);
              foreach ($cari11A5->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A5_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A6=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A6_lama']);
              foreach ($cari11A6->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A6_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A7=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A7_lama']);
              foreach ($cari11A7->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A7_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A8=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A8_lama']);
              foreach ($cari11A8->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A8_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11A9=$this->Kelas_siswa_model->cari_siswa_kelas($data['11A9_lama']);
              foreach ($cari11A9->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11A9_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11S1=$this->Kelas_siswa_model->cari_siswa_kelas($data['11S1_lama']);
              foreach ($cari11S1->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11S1_baru'], $data['id_th_akademik'], $nis);
              };
              $cari11S2=$this->Kelas_siswa_model->cari_siswa_kelas($data['11S2_lama']);
              foreach ($cari11S2->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['11S2_baru'], $data['id_th_akademik'], $nis);
              }

              //kelas12
              $cari12A1=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A1_lama']);
              foreach ($cari12A1->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A1_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A2=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A2_lama']);
              foreach ($cari12A2->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A2_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A3=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A3_lama']);
              foreach ($cari12A3->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A3_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A4=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A4_lama']);
              foreach ($cari12A4->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A4_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A5=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A5_lama']);
              foreach ($cari12A5->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A5_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A6=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A6_lama']);
              foreach ($cari12A6->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A6_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A7=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A7_lama']);
              foreach ($cari12A7->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A7_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A8=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A8_lama']);
              foreach ($cari12A8->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A8_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12A9=$this->Kelas_siswa_model->cari_siswa_kelas($data['12A9_lama']);
              foreach ($cari12A9->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12A9_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12S1=$this->Kelas_siswa_model->cari_siswa_kelas($data['12S1_lama']);
              foreach ($cari12S1->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12S1_baru'], $data['id_th_akademik'], $nis);
              };
              $cari12S2=$this->Kelas_siswa_model->cari_siswa_kelas($data['12S2_lama']);
              foreach ($cari12S2->result() as $row){
                $nis=$row->nis;
                $this->Kelas_siswa_model->insert($data['12S2_baru'], $data['id_th_akademik'], $nis);
              };
            }
            $actif = array(
              'page_header' => 'kenaikan kelas',
              'active '      => 'naik_kelas',
            );
            $this->session->set_flashdata('message', 'Naik Kelas Berhasil');
            $this->template->display('template/notif_sukses',$actif);
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas_siswa', TRUE));
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_th_akademik' => $this->input->post('id_th_akademik',TRUE),
	    );

            $this->Kelas_siswa_model->update($this->input->post('id_kelas_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelas_siswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_siswa_model->get_by_id($id);

        if ($row) {
            $this->Kelas_siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelas_siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas_siswa'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	//$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	//$this->form_validation->set_rules('id_th_akademik', 'id th akademik', 'trim|required');

	$this->form_validation->set_rules('id_kelas_siswa', 'id_kelas_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_naikKelas()
    {
	$this->form_validation->set_rules('br_10A1', 'br_10A1', 'trim|required');
  $this->form_validation->set_rules('br_11A1', 'br_11A1', 'trim|required');
  $this->form_validation->set_rules('br_12A1', 'br_12A1', 'trim|required');
	$this->form_validation->set_rules('id_th_akademik', 'id th akademik', 'trim|required');

	$this->form_validation->set_rules('id_kelas_siswa', 'id_kelas_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas_siswa.php */
/* Location: ./application/controllers/Kelas_siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:44 */
/* http://harviacode.com */
