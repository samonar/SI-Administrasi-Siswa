<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jn_tagihan extends CI_Controller
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
            $config['base_url'] = base_url() . 'jn_tagihan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jn_tagihan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jn_tagihan/index.html';
            $config['first_url'] = base_url() . 'jn_tagihan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jn_tagihan_model->total_rows($q);
        $jn_tagihan = $this->Jn_tagihan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jn_tagihan_data' => $jn_tagihan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jn_tagihan/jn_tagihan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jn_tagihan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jn_tagihan' => $row->id_jn_tagihan,
		'jn_tagihan' => $row->jn_tagihan,
	    );
            $this->load->view('jn_tagihan/jn_tagihan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jn_tagihan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jn_tagihan/create_action'),
    	    'id_jn_tagihan' => set_value('id_jn_tagihan'),
    	    'jn_tagihan' => set_value('jn_tagihan'),
            'page_header' => '',
            'active' => 'tagihan',
	);
        $this->template->display('jn_tagihan/jn_tagihan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jn_tagihan' => $this->input->post('jn_tagihan',TRUE),
	    );

            $this->Jn_tagihan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jn_tagihan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jn_tagihan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jn_tagihan/update_action'),
		'id_jn_tagihan' => set_value('id_jn_tagihan', $row->id_jn_tagihan),
		'jn_tagihan' => set_value('jn_tagihan', $row->jn_tagihan),
	    );
            $this->load->view('jn_tagihan/jn_tagihan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jn_tagihan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jn_tagihan', TRUE));
        } else {
            $data = array(
		'jn_tagihan' => $this->input->post('jn_tagihan',TRUE),
	    );

            $this->Jn_tagihan_model->update($this->input->post('id_jn_tagihan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jn_tagihan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jn_tagihan_model->get_by_id($id);

        if ($row) {
            $this->Jn_tagihan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jn_tagihan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jn_tagihan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jn_tagihan', 'jn tagihan', 'trim|required');

	$this->form_validation->set_rules('id_jn_tagihan', 'id_jn_tagihan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jn_tagihan.xls";
        $judul = "jn_tagihan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Jn Tagihan");

	foreach ($this->Jn_tagihan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jn_tagihan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Jn_tagihan.php */
/* Location: ./application/controllers/Jn_tagihan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-12 03:31:27 */
/* http://harviacode.com */