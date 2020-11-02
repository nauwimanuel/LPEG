<?php
	class Tentang extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}

		// Method Utama
		public function index(){
			$data['judul'] = 'Tentang';
			$data['menu1'] = '';
			$data['menu2'] = '';
			$data['menu3'] = '';
			$data['menu4'] = '';
			$data['menu5'] = '';
			$data['menu6'] = 'class="active"';
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($this->session->user);
			$this->load->view('static/header', $data);
			$this->load->view('tentang/index');
			$this->load->view('static/footer');
		}


	}