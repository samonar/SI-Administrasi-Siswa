<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Th_akademik extends CI_Controller
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
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'th_akademik/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'th_akademik/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'th_akademik/index.html';
            $config['first_url'] = base_url() . 'th_akademik/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Th_akademik_model->total_rows($q);
        $th_akademik = $this->Th_akademik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'th_akademik_data' => $th_akademik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('th_akademik/th_akademik_list', $data);

    }

    public function read($id)
    {
        $row = $this->Th_akademik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_th_akademik' => $row->id_th_akademik,
		'tahun' => $row->tahun,
		'semester' => $row->semester,
		'status' => $row->status,
	    );
            $this->load->view('th_akademik/th_akademik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('th_akademik'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('th_akademik/create_action'),
	    'id_th_akademik' => set_value('id_th_akademik'),
	    'tahun' => set_value('tahun'),
	    'semester' => set_value('semester'),
	    'status' => set_value('status'),
      'page_header'           => 'tagihan', //judul halaman
      'active'                => '',
	);
        $this->template->display('th_akademik/th_akademik_form', $data);
    }

    public function create_action()
    {
        $this->_rules2();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'tahun' => $this->input->post('tahun',TRUE),
        		'semester' => $this->input->post('semester',TRUE),
        		'status' => 0,
        	   );
             $jumlah=$this->Th_akademik_model->count_row();
             if ($jumlah>0) {
              $jumlah=$jumlah+1;
               if ($jumlah<10) {
                 $nomor='TH00'.$jumlah;
               }if ($jumlah>=10 && $jumlah<100) {
                 $nomor='TH0'.$jumlah;
               }if ($jumlah>=100 && $jumlah<1000) {
                 $nomor='TH'.$jumlah;
               }
               $data['id_th_akademik'] = $nomor;
            }

            $this->Th_akademik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('th_akademik/create'));
        }
    }

    public function update($id)
    {
        $row = $this->Th_akademik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('th_akademik/update_action'),
            		'id_th_akademik' => set_value('id_th_akademik', $row->id_th_akademik),
            		'tahun' => set_value('tahun', $row->tahun),
            		'semester' => set_value('semester', $row->semester),
            		'status' => set_value('status', $row->status),
            );
            $this->load->view('th_akademik/th_akademik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('th_akademik'));
        }
    }

    public function update_action()
    {
        $this->_rules1();

        if ($this->form_validation->run() == FALSE) {
            $this->pindah_semester();
        } else {
          $tahun_naik= $this->input->post('id_th_akademik');
          $th_aktif=$this->input->post('th_aktif');
          $semester=$this->input->post('semester');
            $data = array(
		            'status' => 1,
	          );
            $data2 = array(
              'status' => 0,
            );
            $notif = array(
              'notif' =>'sukses' ,
              'page_header' => 'tahun aktif',
              'active' =>'',
            );
            $kelas_siswa=$this->Th_akademik_model->cari_siswa_kelas($th_aktif)->result();
            if (empty($kelas_siswa[1]->nis))
            {
                $cek= 1;
            }
            else
            {
                $cek=$this->Th_akademik_model->cek_siswa_kelas($kelas_siswa[1]->nis,$tahun_naik)->result();
            }
            // $cek=$this->Th_akademik_model->cek_siswa_kelas($kelas_siswa[1]->nis,$tahun_naik)->result();
            if ($cek == NULL) {
              if ($semester==1) {
                $kelas_siswa=$this->Th_akademik_model->cari_siswa_kelas($th_aktif)->result();
                foreach ($kelas_siswa as $row ) {
                  $datasiswa = array(
                    'nis' =>$row->nis ,
                    'id_kelas'=>$row->id_kelas,
                    'id_th_akademik'=>$tahun_naik,
                  );
                  $this->Kelas_siswa_model->insert_siswa($datasiswa);
                }
              }
            }
            $this->Th_akademik_model->update($this->input->post('id_th_akademik', TRUE), $data, $data2);
            $this->session->set_flashdata('message', 'Pindah Semester Berhasil');
            $this->template->display('template/notif_sukses',$notif);
        }
    }

    public function delete($id)
    {
        $row = $this->Th_akademik_model->get_by_id($id);

        if ($row) {
            $this->Th_akademik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('th_akademik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('th_akademik'));
        }
    }

    public function pindah_semester()
    {
      $data = array(
        'th_aktif' => $this->Th_akademik_model->th_aktif(),
        'id_th_akademik' => $this->Th_akademik_model->get_all(),
        'action' => site_url('th_akademik/update_action'),
        'page_header'           => 'tahun aktif', //judul halaman
        'active'                => 'pindah semester',
      );
      $this->template->display('th_akademik/pindah_semester',$data);
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_th_akademik', 'id_th_akademik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules1()
    {
  $this->form_validation->set_rules('id_th_akademik', 'id_th_akademik', 'trim|required');

  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules2()
    {
  $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
  $this->form_validation->set_rules('semester', 'semester', 'trim|required');


  $this->form_validation->set_rules('id_th_akademik', 'id_th_akademik', 'trim');
  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Th_akademik.php */
/* Location: ./application/controllers/Th_akademik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-06 05:39:45 */
/* http://harviacode.com */
