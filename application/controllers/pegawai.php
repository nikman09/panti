<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_pegawai');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Master'; 
			$d['judul'] = 'Pegawai';

			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'pegawai/view';
			$d['data'] = $this->model_pegawai->all();// mengambil semua data pegawai
			$d['data_jenjang'] = $this->model_data->jenjang_pendidikan();
			$d['data_status'] = $this->model_data->status_pegawai();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}
	public function simpan(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['nip'] = $this->input->post('nip');

			// $dt['id_pegawai'] = $this->input->post('id');
			$dt['nip'] = $this->input->post('nip');
			$dt['nama_pegawai'] = $this->input->post('nama');
			$dt['sex'] = $this->input->post('sex');
			$dt['tempat_lahir'] = $this->input->post('tempat');
			$dt['tanggal_lahir'] = tgl_str($this->input->post('tanggal'));
			$dt['alamat'] = $this->input->post('alamat');
			$dt['hp'] = $this->input->post('hp');
			$dt['jabatan'] = $this->input->post('jabatan');
			$dt['pendidikan'] = $this->input->post('pendidikan');
			$dt['jurusan'] = $this->input->post('jurusan');
			$dt['status'] = $this->input->post('status');
			$dt['password'] = md5($dt['nip']);



			if ($this->model_pegawai->ada($id)) {
				
				//$dt['tgl_update'] = date('Y-m-d h:i:s');
				$this->model_pegawai->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				
				//$dt['tgl_insert'] = date('Y-m-d h:i:s');
				$this->model_pegawai->insert($id,$dt);
				echo "Data Sukses Disimpan";

			}
		} else {
			redirect('login','refresh');
		}
	}

	public function hapus(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['id_pegawai'] = $this->uri->segment(3);

			if ($this->model_pegawai->ada($id)) {
				
				$this->model_pegawai->delete($id);
			} 
			redirect('pegawai','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function cari(){

		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['nip'] = $this->uri->segment(3);
			
			if ($this->model_pegawai->ada($id)){
				$dt = $this->model_pegawai->get($id);

				$d['id'] = $dt->id_pegawai;
				$d['nip'] = $dt->nip;
				$d['nama'] = $dt->nama_pegawai;
				$d['sex'] = $dt->sex;
				$d['tempat'] = $dt->tempat_lahir;
				$d['tanggal'] = tgl_str($dt->tanggal_lahir);
				$d['alamat'] = $dt->alamat;
				$d['hp'] = $dt->hp;
				$d['jabatan'] = $dt->jabatan;
				$d['pendidikan'] = $dt->pendidikan;
				$d['jurusan'] = $dt->jurusan;
				$d['status'] = $dt->status;

				
			} else {
				$d['id'] = '';
				$d['nip'] = '';
				$d['nama'] = '';
				$d['sex'] = '';
				$d['tempat'] = '';
				$d['tanggal'] = '';
				$d['alamat'] = '';
				$d['hp'] = '';
				$d['jabatan'] = '';
				$d['pendidikan'] = '';
				$d['jurusan'] = '';
				$d['status'] = '';
			}

			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

}