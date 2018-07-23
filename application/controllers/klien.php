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
			$d['class'] = 'Pelayanan'; 
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
			if ($this->model_klien->ada($id)) {
				
					$config['upload_path'] = './assets/foto_klien';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload("foto")) {
					$upload = $this->upload->data();
					$foto = $upload["raw_name"].$upload["file_ext"];
					$data['foto'] = $foto;
					
					$config['image_library'] = 'gd2';
					$config['source_image'] = "./assets/foto_klien/$foto";
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['width']         = 1000;
					$config['height']       = 1000;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$row= $this->model_klien->get($id);
					$foto2 = $row->foto;
					$path1 ="./assets/foto_klien/".$foto2."";
					if(is_file($path1)) {
						unlink($path1); //menghapus gambar di folder produk 
					}
					$dt['foto'] = $foto;
				}
				$dt['tgl_update'] = date('Y-m-d h:i:s');
				$this->model_klien->update($id, $dt);
				redirect(site_url('klien/edit/'.$id['id_klien'] .'?b=1'));

			} else {
				$config['upload_path'] = './assets/foto_klien';
				$config['allowed_types'] = 'png|jpg|jpeg';
				$this->load->library('upload', $config);
				$this->upload->do_upload("foto");
				$upload = $this->upload->data();
				$foto = $upload["raw_name"].$upload["file_ext"];
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = "./assets/foto_klien/$foto";
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 1000;
				$config['height']       = 1000;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$dt['foto'] = $foto;
				$dt['status_daftar'] = $this->input->post('y');
				$this->model_klien->insert($dt);
				redirect(site_url('klien/tambah?a=1'));

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
						'judul' => 'Tambah Klien',
						'a' => 'tambah',
						'class' => 'Pelayanan',
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
						'tgl_masuk' => '',
						'tgl_daftar' => '',
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
						'judul' => 'Edit Klien',
						'class' => 'Pelayanan',
						'a' => 'edit',
						'id_klien' => $id_klien ,
						'nik' => $dt->nik ,
						'nir' => $dt->nir ,
						'nama_klien' => $dt->nama_klien,
						'tempat_lahir'	=> $dt->tempat_lahir,
						'tanggal_lahir'	=> tgl_str($dt->tanggal_lahir),
						'sex'	=> $dt->sex,
						'agama'	=> $dt->agama,
						'alamat'	=> $dt->alamat,
						'kota'	=> $dt->kota,
						'hp'	=> $dt->hp,
						'email'	=> $dt->email,
						'status'	=> $dt->status,
						'nama_ayah'	=> $dt->nama_ayah,
						'nama_ibu'	=> $dt->nama_ibu,
						'alamat_ortu'=> $dt->alamat_ortu,
						'hp_ortu'	=> $dt->hp_ortu,
						'all_klien' => $this->model_klien->data_all_klien(),
						'content'	=> 'klien/form_klien',
						'tgl_hari' => hari_ini(date('w')),
						'tgl_indo' => tgl_indo(date('Y-m-d')),
						'foto'	=> $dt->foto,
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
			$id['id_klien'] = $this->uri->segment(3);

			if ($this->model_klien->ada($id)) {
				
				$this->model_klien->delete($id);
			} 
			redirect('klien','refresh');
		} else {
			redirect('login','refresh');
		}	
	}

	public function daftarklien()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Laporan'; 
			$d['judul'] = 'Daftar Klien';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'klien/viewdaftarklien';
			$d['data'] = $this->model_klien->all();
			$d['data_status'] = $this->model_data->status_klien();
			$d['all_klien'] = $this->model_klien->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function printklien(){
	
		$id['id_klien'] = $this->uri->segment(3);
		if ($this->model_klien->ada($id)){
			$d['data'] = $this->model_klien->get_by_id_klien($id['id_klien']);
		} 
		$this->load->view('klien/v_laporan',$d);

	}

	public function perkabupaten(){
		$d['tgl_hari'] = hari_ini(date('w'));
		$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
		$d['class'] = 'Laporan'; 
		$d['judul'] = 'Daftar Klien Daerah Asal';
		$d['nama_klien'] = $this->session->userdata('nama_klien');
		$d['content'] = 'klien/perkabupaten';
		$d['data_kota'] = $this->model_data->kota();
		$this->load->view('home', $d);	

	}

	public function cetakperkabupaten(){
	
		$id['kota'] = 	$this->input->get('kota');
		$d['kota'] =$id['kota'];
		$d['data'] = $this->model_klien->getperkabupaten($id['kota']);
		$this->load->view('klien/v_laporanperkabupaten',$d);

	}

	public function cetakdaftarklien(){
	
		$d['data'] = $this->model_klien->getall();
		$this->load->view('klien/v_laporandaftarklien',$d);

	}

}