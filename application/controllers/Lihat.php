<?php

	class Lihat extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}
		
		public function index(){
			$data['judul'] = 'Laporan Harian';
			$data['menu1'] = '';
			$data['menu2'] = '';
			$data['menu3'] = 'class="active"';
			$data['menu4'] = '';
			$data['menu5'] = '';
			$data['menu6'] = '';
			$nip = $this->session->user;
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			$data['laporan'] = $this->Model_laporan->getAllLaporanPerHari($nip);
			$data['rekapan'] = $this->Model_laporan->getAllJamPerHari($nip);
			$this->load->view('static/header', $data);
			$this->load->view('lihat/harian');
			$this->load->view('static/footer');
		}


		public function bulanan(){
			if( !empty( $this->input->post('tanggal') ) ){
				$bln = $this->input->post('tanggal');
			} else {
				$bln = date('Y-m');
			}

			$data['judul'] = 'Rekap Bulanan';
			$data['menu1'] = '';
			$data['menu2'] = '';
			$data['menu3'] = '';
			$data['menu4'] = 'class="active"';
			$data['menu5'] = '';
			$data['menu6'] = '';
			$nip = $this->session->user;
			$data['user']    = $this->Model_user->getAllUserById($nip);
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			$data['atasan1'] = $this->Model_pegawai->getAllPegawaiById($data['pegawai'][0]['atasan1']);
			$data['atasan2'] = $this->Model_pegawai->getAllPegawaiById($data['pegawai'][0]['atasan2']);
			$data['rekapan']   = $this->Model_laporan->getAllRekapan($nip);
			$this->load->view('static/header', $data);
			$this->load->view('lihat/bulanan');
			$this->load->view('static/footer');
		}

		// public function rekap(){
		// 	$cek = $this->db->get_where('laporan', ['tanggal' => ])
		// }
	}