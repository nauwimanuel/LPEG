<?php

	class Masukan extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}
		
		public function index(){
			$this->form_validation->set_rules('kegiata', 'Kegiatan', 'trim');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim');
			$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim');
			$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim');
			$this->form_validation->set_rules('satuan_kegiatan', 'Satuan Kegiatan', 'trim');
			$this->form_validation->set_rules('jumlah_satuan', 'Jumlah Satuan', 'trim');
			$this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim');
			$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'trim');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

			if($this->form_validation->run() == false){
				$data['judul'] = 'Masukan Data';
				$data['menu1'] = '';
				$data['menu2'] = 'class="active"';
				$data['menu3'] = '';
				$data['menu4'] = '';
				$data['menu5'] = '';
				$data['menu6'] = '';
				$nip = $this->session->user;
				$data['user']    = $this->Model_user->getAllUserById($nip);
				$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
				$data['laporan'] = $this->Model_laporan->getAllLaporanById($nip);
				$this->load->view('static/header', $data);
				$this->load->view('masukan/index');
				$this->load->view('static/footer');				
			} else {
				if( $this->input->post('jam_mulai') < $this->input->post('jam_selesai') ){
					$this->Model_laporan->insertLaporan();
					$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Berhasil Disimpan.</div>');
					redirect(base_url('lihat/index'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Jam Mulai Kegiatan harus lebih kecil dari Jam Selesai Kegiatan, silahkan cobah lagi.</div>');
					redirect(base_url('masukan/index'));
				}
			}
		}
	}