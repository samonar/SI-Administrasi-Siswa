<?php
class template_siswa {

	protected $_ci;

	function __construct(){
		$this ->_ci=&get_instance();
	}

	function display($template,$data=null){
		$data['content']=$this->_ci->load->view($template,$data,true);
		$data['header']=$this->_ci->load->view('template_siswa/header',$data,true);

		$data['sidebar']=$this->_ci->load->view('template_siswa/sidebar',$data,true);


		$data['foot']=$this->_ci->load->view('template_siswa/foot',$data,true);
		$this->_ci->load->view('template_siswa/index', $data);
}
}
