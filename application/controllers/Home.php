<?php
	class Home extends CI_Controller {
		public function __construct(){
			parent::__construct();
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}
		}


		// Method Utama
		public function index(){
			$data['judul'] = 'Halaman Utama';
			$data['menu1'] = 'class="active"';
			$data['menu2'] = '';
			$data['menu3'] = '';
			$data['menu4'] = '';
			$data['menu5'] = '';
			$data['menu6'] = '';
			$nip = $this->session->user;
			// echo $nip;die;

			//konfigurasi pagination
	        $config['base_url'] = 'http://localhost/lpeg/home/index/'; //site url
	        $config['total_rows'] = $this->db->count_all('laporan'); //total row
	        $config['per_page'] = 10;  //show record per halaman 4
	        $config["uri_segment"] = 3;  // uri parameter 3
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);
	 
	        $config['full_tag_open']    = '<ul class="pagination pagination-sm no-margin pull-right">';
	        $config['full_tag_close']   = '</ul>';

	        $config['first_link']       = 'Awal';
	        $config['first_tag_open']   = '<li class="page-link"><span class="page-item">';
	        $config['first_tagl_close'] = '</span></li>';

	        $config['last_link']        = 'Akhir';
	        $config['last_tag_open']    = '<li class="page-link"><span class="page-item">';
	        $config['last_tagl_close']  = '</span></li>';

	        $config['next_link']        = '&raquo';//'Selanjudnya';
	        $config['next_tag_open']    = '<li class="page-link"><span class="page-item">';
	        $config['next_tagl_close']  = '</span></li>';

	        $config['prev_link']        = '&laquo';//'Sebelumnya';
	        $config['prev_tag_open']    = '<li class="page-link"><span class="page-item">';
	        $config['prev_tagl_close']  = '</span></li>';

	        $config['num_tag_open']     = '<li class="page-link"><span class="page-item">';
	        $config['num_tag_close']    = '</span></li>';
	        
	        $config['cur_tag_open']     = '<li class="page-link active"><span class="page-item">';
	        $config['cur_tag_close']    = '</span></li>';
	 
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
	 
	        $data['laporanpegin'] = $this->Model_laporan->getAllLaporanPerPag($config["per_page"], $data['page'], $nip);
	 
	        $data['pagination'] = $this->pagination->create_links();

	        $jl = $this->db->query("SELECT lap_id FROM laporan WHERE lap_nip = $nip");
	        $data['jl'] = $jl->num_rows();
	        $ju = $this->db->query("SELECT user_id FROM users");
	        $data['ju'] = $ju->num_rows();

			$data['user']    = $this->Model_user->getAllUserById($nip);
			$data['pegawai'] = $this->Model_pegawai->getAllPegawaiById($nip);
			// $data['atasan'] = $this->Model_pegawai->getAllPegawaiById($data['pegawai'][0]['peg_atasan']);
			// $data['atasan2'] = $this->Model_pegawai->getAllPegawaiById($data['pegawai'][0]['atasan2']);
			// $data['laporan'] = $this->Model_laporan->getAllLaporanById($nip);
			$this->load->view('static/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('static/footer');
		}


		// Method Edit Profil
		public function editProfil(){
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
			$this->form_validation->set_rules('atasan1', 'Atasan Langsung', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('atasan2', 'Atasan dari Atasan Langsung', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('tugas_pokok', 'Tugas Pokok', 'required|trim|min_length[5]');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data Profil gagal di ubah, silahkan cobah lagi.</div>');
				redirect(base_url('home/index'));
			} else {
				$this->Model_pegawai->updatePegawai($this->session->user);
				$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Profil berhasil di ubah.</div>');
				redirect(base_url('home/index'));
			}
		}


		// Method Ganti Kata Sandi
		public function gantiSandi(){
			$this->form_validation->set_rules('sandilama', 'Sandi Lama', 'required|trim');
			$this->form_validation->set_rules('sandibaru', 'Sandi Baru', 'required|trim|min_length[5]|matches[sandibaru]');
			$this->form_validation->set_rules('ceksandibaru', 'Cek Sandi Baru', 'required|trim|matches[ceksandibaru]');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Kata Sandi gagal di ubah, silahkan cobah lagi.</div>');
				redirect(base_url('home/index'));
			} else {
				$sandi1 = $this->input->post('sandilama');
				$nip = $this->session->user;
				$this->db->where('user_nip', $nip);
				$query = $this->db->get('users');
				$sandi2 = $query->result_array()[0]['user_kata_sandi'];
				
				if($this->input->post('sandibaru') == $this->input->post('ceksandibaru')){
					if(password_verify($sandi1, $sandi2)){
						$this->Model_user->updateSandiUser($this->session->user);
						$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Kata Sandi berhasil di ubah.</div>');
						redirect(base_url('home/index'));
					} else {
						$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Kata Sandi lama tidak cocok, silahkan coba lagi.</div>');
						redirect(base_url('home/index'));
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Konfirmasi Kata Sandi Baru Gagal (tidak cocok).</div>');
					redirect(base_url('home/index'));
				}
			}
		}


		// Method Edit Data
		public function editData(){
			$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
			$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
			$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');
			$this->form_validation->set_rules('satuan_kegiatan', 'Satuan Kegiatan', 'required|trim');
			$this->form_validation->set_rules('jumlah_satuan', 'Jumlah Satuan', 'required|trim');
			$this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required|trim');
			$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required|trim');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4>Data Harus diisi, tidak boleh kosong.</div>');
				redirect(base_url('home/index'));
			} else {
				$this->Model_laporan->editLaporan();
				$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Telah Diubah.</div>');
				redirect(base_url('home/index'));
			}
		}


		// Method Hapus Data
		public function hapusData($id){
			$this->Model_laporan->hapusById($id);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data telah terhapus.</div>');
			redirect(base_url('home/index'));
		}
	}