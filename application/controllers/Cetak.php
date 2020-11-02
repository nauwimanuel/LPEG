<?php

	class Cetak extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}
		
		public function index($tgl){
			$data['judul'] = 'Cetak Harian';
			// $nip = $this->session->user;
			// $data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			// $data['laporan'] = $this->Model_laporan->getAllLaporanPerHari($nip, $tgl);

			$nip = $this->session->user;
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			$data['laporan'] = $this->Model_laporan->getAllLaporanPerHari($nip);
			$data['rekapan'] = $this->Model_laporan->getAllJamPerHari($nip);
			$this->load->view('cetak/harian', $data);
		}


		public function bulanan(){
			$nip = $this->session->user;
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			$data['laporan'] = $this->Model_laporan->getAllLaporanById($nip);
			$data['judul'] = 'Cetak Bulanan';
			$this->load->view('cetak/bulanan', $data);
		}
	}