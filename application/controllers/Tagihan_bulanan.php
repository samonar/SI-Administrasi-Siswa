<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tagihan_bulanan extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model',
      'Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model',
      'Th_akademik_model','Tagihan_bulanan_model'));
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
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'tagihan_bulanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tagihan_bulanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tagihan_bulanan/index.html';
            $config['first_url'] = base_url() . 'tagihan_bulanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tagihan_bulanan_model->total_rows($q);
        $tagihan_bulanan = $this->Tagihan_bulanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tagihan_bulanan_data' => $tagihan_bulanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tagihan_bulanan/tagihan_bulanan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Tagihan_bulanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tagihan_bulanan' => $row->id_tagihan_bulanan,
		'jn_tagihan' => $row->jn_tagihan,
		'kelas' => $row->kelas,
		'bulan' => $row->bulan,
		'nominal' => $row->nominal,
		'id_th_akademik' => $row->id_th_akademik,
	    );
            $this->load->view('tagihan_bulanan/tagihan_bulanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tagihan_bulanan'));
        }
    }

    public function update($id)
    {
        $row = $this->Tagihan_bulanan_model->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('tagihan_bulanan/update_action'),
        		'id_tagihan_bulanan' => set_value('id_tagihan_bulanan', $row->id_tagihan_bulanan),
        		'jn_tagihan' => set_value('jn_tagihan', $row->jn_tagihan),
        		'kelas' => set_value('kelas', $row->kelas),
        		'bulan' => set_value('bulan', $row->bulan),
        		'nominal' => set_value('nominal', $row->nominal),
        		'id_th_akademik' => set_value('id_th_akademik', $row->id_th_akademik),
        	    );
              $this->load->view('tagihan_bulanan/tagihan_bulanan_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('tagihan_bulanan'));
            }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tagihan_bulanan', TRUE));
        } else {
            $data = array(
		'jn_tagihan' => $this->input->post('jn_tagihan',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'id_th_akademik' => $this->input->post('id_th_akademik',TRUE),
	    );

            $this->Tagihan_bulanan_model->update($this->input->post('id_tagihan_bulanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tagihan_bulanan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tagihan_bulanan_model->get_by_id($id);

        if ($row) {
            $this->Tagihan_bulanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tagihan_bulanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tagihan_bulanan'));
        }
    }

      public function buat_tagihan()
     {
         //$det_tagihan = $this->Tagihan_bulanan_model->search();
         $th_akademik= $this->Th_akademik_model->get_all();
         $tahun = $this->input->post('id_th_akademik');
            $data = array(
               'id_th_akademik'=> $this->Th_akademik_model->get_all(),
               'query' => $this->Tagihan_bulanan_model->search($tahun),
               'action' => site_url('tagihan_bulanan/buat_tagihan'),
               'page_header'           => 'tagihan', //judul halaman
               'active'                => 'buat tagihan',

            );
         $this->template->display('det_tagihan/cek_tagihan',$data);
     }

      public function create()
       {
           $data = array(
             'action' => site_url('tagihan_bulanan/create_action'),
             'id_tagihan_bulanan' => set_value('id_tagihan_bulanan'),
             'id_th_akademik' => $this->Th_akademik_model->get_all(),
             'th_aktif' => $this->Th_akademik_model->th_aktif(),
             'kelas' => $this->Kelas_model->grup_kls(),
             'jn_tagihan' => $this->Jn_tagihan_model->get_all(),
             'nominal' => set_value('nominal'),
             'bulan' => set_value('bulan'),
             'page_header'           => 'tagihan', //judul halaman
             'active'                => 'buat tagihan',
         );
           $this->template->display('det_tagihan/det_tagihan_form', $data);
       }

   public function create_action()
   {
       $this->_rules1();

       if ($this->form_validation->run() == FALSE) {
           $this->create();
       } else {
        $id_tagihan_bulanan=$this->input->post('id_tagihan_bulanan',TRUE);
         $id_th_akademik=$this->input->post('th_aktif',TRUE);
         $kelas=$this->input->post('kelas',TRUE);
         $jn_tagihan=$this->input->post('jn_tagihan',TRUE);
         $nominal=$this->input->post('nominal',TRUE);
         // $bulan= $this->input->post('bulan',TRUE);
         $semester=$this->input->post('semester',TRUE);
        if ($semester==1) {
          if ($jn_tagihan==2) {
           $bulan=[7];
          }else{
            $bulan=[7,8,9,10,11,12];
          }
        }
        else {
          $bulan=[1,2,3,4,5,6];          
        }
         

         $jumlah=count($bulan);

         for($i=0;$i<$jumlah;$i++)
         {
          $no=$this->Tagihan_bulanan_model->total_rows();
          $no++;
           $data = array(
           'id_tagihan_bulanan' => $no,
           'jn_tagihan' => $jn_tagihan,
           'kelas' => $kelas,
           'bulan' => $bulan[$i],
           'nominal' => $nominal,
           'id_th_akademik' => $id_th_akademik,
           );

           $data2 = array('id_th_akademik' => $id_th_akademik, );

           $cek=$this->Tagihan_bulanan_model->cekinput($data);

           $num=$cek->num_rows();

           if($num>0)
           {
             echo "<script>alert('Tagihan sudah ada')</script>";
             redirect ('tagihan_bulanan/create','refresh');
           }
           else
           {
             $this->Tagihan_bulanan_model->insert($data);

              $generate=$this->Kelas_siswa_model->get_by_tingkat($kelas);
            foreach($generate->result() as $row){
            $id_kelas_siswa        = $row->id_kelas_siswa;
            $id_tagihan_bulanan    = $no;
            $bayar = 0;
            $month      = $bulan[$i];
            $nominal     = $nominal;
            $status = 0;

            $this->Tagihan_siswa_kls_model->inputGenerate($id_kelas_siswa,$id_tagihan_bulanan,$bayar,$month,$nominal,$status);
          }
           }
         }
           $this->session->set_flashdata('message', 'Buat Tagihan Sukses');
           redirect(site_url('tagihan_bulanan/buat_tagihan'));
       }
   }

    public function action_insert(){
     $this->Tagihan_bulanan_model->insert1();
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jn_tagihan', 'jn tagihan', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('bulan[]', 'bulan', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('id_th_akademik', 'id th akademik', 'trim|required');

	$this->form_validation->set_rules('id_tagihan_bulanan', 'id_tagihan_bulanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules1()
    {
  $this->form_validation->set_rules('jn_tagihan', 'jn tagihan', 'trim|required');
  $this->form_validation->set_rules('kelas', 'Tingkat', 'trim|required');
  // $this->form_validation->set_rules('bulan[]', 'bulan', 'trim|required');
  $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
  $this->form_validation->set_rules('th_aktif', 'th_aktif', 'trim|required');

  $this->form_validation->set_rules('id_tagihan_bulanan', 'id_tagihan_bulanan', 'trim');
  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
