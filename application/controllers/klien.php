<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klien extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_klien');
	    $this->load->model('model_probi');
	    $this->load->model('model_asrama');
	    $this->load->model('model_rombel');
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'master'; 
			$d['judul'] = 'Klien';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'klien/view';
			$d['data'] = $this->model_klien->all();
			$d['data_status'] = $this->model_data->status_klien();
			$d['all_klien'] = $this->model_klien->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

public function simpan(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			date_default_timezone_set('Asia/Jakarta');
			$id['id_klien'] = $this->input->post('id');
			$dt['id_klien'] = $this->input->post('id');
			$dt['nir'] = $this->input->post('nir');
			$dt['nik'] = $this->input->post('nik');
			$dt['nama_klien'] = $this->input->post('nama_klien');
			$dt['sex'] = $this->input->post('sex');
			$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
			$dt['tanggal_lahir'] = tgl_str($this->input->post('tanggal_lahir'));
			$dt['alamat'] = $this->input->post('alamat');
			$dt['hp'] = $this->input->post('hp');
			$dt['kota'] = $this->input->post('kota');
			$dt['email'] = $this->input->post('email');
			$dt['status'] = $this->input->post('status');
			$dt['nama_ayah'] = $this->input->post('nama_ayah');
			$dt['nama_ibu'] = $this->input->post('nama_ibu');
			$dt['alamat_ortu'] = $this->input->post('alamat_ortu');
			$dt['hp_ortu'] = $this->input->post('hp_ortu');
			$dt['foto'] = $this->input->post('foto');




			if ($this->model_klien->ada($id)) {
				
				$dt['tgl_update'] = date('Y-m-d h:i:s');
				$this->model_klien->update($id, $dt);
				echo "Data Sukses Disimpan";
			} else {
				$dt['tgl_insert'] = date('Y-m-d h:i:s');
				$this->model_klien->insert($id,$dt);
				echo "Data Sukses Disimpan";

			}
		} else {
			redirect('login','refresh');
		}
	}

	public function tambah(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			
           
			$d = array(
						'judul' => 'Klien',
						'a' => 'tambah',
						'class' => 'master',
						'id_klien' => '',
						'nir' => '' ,
						'nik' => '' ,
						'nama_klien' => '',
						'status'	=> '',
						'tempat_lahir'	=> '',
						'tanggal_lahir'	=> '',
						'sex'	=> '',
						'agama' => '',
						'alamat'	=> '',
						'kota'	=> '',
						'hp'	=> '',
						'email'	=> '',
						'nama_ayah'	=> '',
						'nama_ibu'	=> '',
						'alamat_ortu'	=> '',
						'hp_ortu'	=> '',
						'foto'	=> '',
						'kategori'	=> '',
						'all_klien' => $this->model_klien->data_all_klien(),
						'content'	=> 'klien/form_klien',
						'tgl_hari' => hari_ini(date('w')),
						'tgl_indo' => tgl_indo(date('Y-m-d'))
					);
			// $d['rombel'] = $this->model_rombel->all2();
			// $d['probi'] = $this->model_probi->all2();
			// $d['asrama'] = $this->model_asrama->all2();
			$d['data_status'] = $this->model_data->status_klien();
			$d['data_agama'] = $this->model_data->agama();
			$d['data_kota'] = $this->model_data->kota();
			$this->load->view('home', $d);


		} else {
			redirect('login','refresh');
		}
	}

	public function edit(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			
           $id_klien = $this->uri->segment(3);
           $dt = $this->model_klien->get_by_id_klien($id_klien);
			$d = array(
						'judul' => 'Klien',
						'class' => 'master',
						'a' => 'edit',
						'id_klien' => $id_klien ,
						'nik' => $dt->nik ,
						'nir' => $dt->nir ,
						'nama_klien' => $dt->nama_klien,
						'status'	=> $dt->status,
						'tempat_lahir'	=> $dt->tempat_lahir,
						'tanggal_lahir'	=> tgl_str($dt->tanggal_lahir),
						'sex'	=> $dt->sex,
						'agama'	=> $dt->agama,
						'alamat'	=> $dt->alamat,
						'kota'	=> $dt->kota,
						'hp'	=> $dt->hp,
						'email'	=> $dt->email,
						'nama_ayah'	=> $dt->nama_ayah,
						'nama_ibu'	=> $dt->nama_ibu,
						'alamat_ortu'	=> $dt->alamat_ortu,
						'hp_ortu'	=> $dt->hp_ortu,
						'all_klien' => $this->model_klien->data_all_klien(),
						'content'	=> 'klien/form_klien',
						'tgl_hari' => hari_ini(date('w')),
						'tgl_indo' => tgl_indo(date('Y-m-d'))
					);
				
			// $d['probi'] = $this->model_probi->all2();
			// $d['asrama'] = $this->model_asrama->all2();
			$d['data_status'] = $this->model_data->status_klien();
			$d['data_agama'] = $this->model_data->agama();
			$d['data_kota'] = $this->model_data->kota();
			$this->load->view('home', $d);


		} else {
			redirect('login','refresh');
		}
	}

	public function hapus(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['nir'] = $this->uri->segment(3);

			if ($this->model_klien->ada($id)) {
				
				$this->model_klien->delete($id);
			} 
			redirect('klien','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

}