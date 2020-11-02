<?php

	class Model_pegawai extends CI_Model{
		public function insertPegawai(){
			$data = [
				'peg_nip' => htmlspecialchars($this->input->post('nip', true)),
				'peg_nama' => htmlspecialchars($this->input->post('nama', true)),
				'peg_pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
				'peg_unit_kerja' => htmlspecialchars($this->input->post('unit_kerja', true)),
				'peg_jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'peg_atasan' => htmlspecialchars($this->input->post('atasan1', true)),
				'peg_atasan2' => htmlspecialchars($this->input->post('atasan2', true)),
				'peg_tugas_pokok' => htmlspecialchars($this->input->post('tugas_pokok', true))
			];

			$this->db->insert('pegawai', $data);
		}

		public function updatePegawai($id){
			$data = [
				'peg_nama' => htmlspecialchars($this->input->post('nama', true)),
				'peg_pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
				'peg_unit_kerja' => htmlspecialchars($this->input->post('unit_kerja', true)),
				'peg_jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'peg_atasan' => htmlspecialchars($this->input->post('atasan1', true)),
				'peg_atasan2' => htmlspecialchars($this->input->post('atasan2', true)),
				'peg_tugas_pokok' => htmlspecialchars($this->input->post('tugas_pokok', true))
			];

			$this->db->update('pegawai', $data);
			$this->db->where('peg_nip', $id);
		}

		public function getAllPegawaiById($id){
			$this->db->where("peg_nip = $id");
			$query = $this->db->get('pegawai');
			return $query->result_array();
	    }

	    public function getAllPegawai(){
	    	$nip = $this->input->post('nip');
	    	if( empty($nip) ){
		    	$this->db->select('*');
				$this->db->from('users');
				$this->db->join('pegawai', 'users.user_nip = pegawai.peg_nip');
				$query = $this->db->get();
				return $query->result_array();
			} elseif ( !empty($nip) ) {
		    	$query1 = $this->db->query("SELECT * FROM users WHERE user_nip = '$nip'")->result_array();
		    	$query2 = $this->db->query("SELECT * FROM pegawai WHERE peg_nip = '$nip'")->result_array();

		    	$query = [
		    		[
			    		"user_status" => $query1[0]['user_status'],
			    		"user_nip" => $query1[0]['user_nip'],
			    		"peg_id" => $query2[0]['peg_id'],
			    		"peg_nip" => $query2[0]['peg_nip'],
			    		"peg_nama" => $query2[0]['peg_nama'],
			    		"peg_pangkat" => $query2[0]['peg_pangkat'],
			    		"peg_unit_kerja" => $query2[0]['peg_unit_kerja'],
			    		"peg_jabatan" => $query2[0]['peg_jabatan'],
			    		"peg_atasan" => $query2[0]['peg_atasan'],
			    		"peg_atasan2" => $query2[0]['peg_atasan2'],
			    		"peg_tugas_pokok" => $query2[0]['peg_tugas_pokok'],
			    	]
			    ];

				return $query;
			}
	    }
	}