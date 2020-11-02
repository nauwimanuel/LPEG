<?php

	class Admin extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}

		public function index(){
			$nip = $this->session->user;
			$user = $this->db->get_where('users', ['user_nip' => $nip])->row_array();

			if($this->session->status == 1){
				$data['judul'] = 'Kelola Pengguna';
				$data['menu1'] = '';
				$data['menu2'] = '';
				$data['menu3'] = '';
				$data['menu4'] = '';
				$data['menu5'] = 'class="active"';
				$data['menu6'] = '';
				$ju = $this->db->query("SELECT user_id FROM users");
	        	$data['ju'] = $ju->num_rows();
				$nip = $this->session->user;
				$data['user'] = $this->Model_user->getAllUserById($nip);
				$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
				$data['userpegawai'] = $this->Model_pegawai->getAllPegawai();
				$this->load->view('static/header', $data);
				$this->load->view('admin/index');
				$this->load->view('static/footer');
			} else {
				redirect(base_url('home'));
			}
		}	


		public function tambah(){
			$nip = $this->session->user;
			$user = $this->db->get_where('users', ['user_nip' => $nip])->row_array();

			if($this->session->status == 1){
				$this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim');
				$this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
				$this->form_validation->set_rules('atasan1', 'Atasan Langsung', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('atasan2', 'Atasan dari Atasan Langsung', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('tugas_pokok', 'Tugas Pokok', 'required|trim|min_length[5]');
				$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required|trim|min_length[5]');

				if($this->form_validation->run() == false) {
					$data['judul'] = 'Tambah Pengguna';
					$data['menu1'] = '';
					$data['menu2'] = '';
					$data['menu3'] = '';
					$data['menu4'] = '';
					$data['menu5'] = 'class="active"';
					$data['menu6'] = '';
					$nip = $this->session->user;
					$data['user']    = $this->Model_user->getAllUserById($nip);
					$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
					$data['laporan'] = $this->Model_laporan->getAllLaporanById($nip);
					$this->load->view('static/header', $data);
					$this->load->view('admin/tambah');
					$this->load->view('static/footer');
				} else {
					$this->Model_user->insertUser();
					$this->Model_pegawai->insertPegawai();
					$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Pengguna Baru berhasil di tambahkan.</div>');
					redirect(base_url('admin'));
				}
			} else {
				redirect(base_url('home'));
			}
		}

		public function hapusPegawai($nip){
			if( $this->db->delete('laporan', ['lap_nip' => $nip]) ){
				if( $this->db->delete('pegawai', ['peg_nip' => $nip]) ){
					if( $this->db->delete('users', ['user_nip' => $nip]) ){
						$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Pengguna telah terhapus.</div>');
						redirect(base_url('admin/index'));
					} else {
						$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Gagal !</b></h4> Proses Penghapusan tidak berhasil.</div>');
						redirect(base_url('admin/index'));
					}
				}
			}
		}

	}