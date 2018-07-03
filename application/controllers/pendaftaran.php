<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {	
	 
	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_klien');
	    $this->load->model('model_data');
	}

	public function index()
	{	
		if ($this->input->post()) {
			
			$nik = $this->input->post('ktp');
			$data = $this->model_klien->carinik($nik);
			if ($data->num_rows()>0) {
				$d = array(
					'nama' => $this->input->post('nama'),
					'ktp' => $this->input->post('ktp'),
					'sex' => $this->input->post('sex'),
					'agama' => $this->input->post('agama'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'hp' => $this->input->post('hp'),
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'nama_ayah' => $this->input->post('nama_ayah'),
					'nama_ibu' => $this->input->post('nama_ibu'),
					'alamat_ortu' =>  $this->input->post('alamat_ortu'),
					'hp_ortu' => $this->input->post('hp_ortu'),
					'peringatan' => "*NIK sudah pernah didaftarkan"
				);
				$d['data_agama'] = $this->model_data->agama();
				$d['data_kota'] = $this->model_data->kota();
				$this->load->view('pendaftaran', $d);
			} else {
				$d = array(
					'nama_klien' => $this->input->post('nama'),
					'nik' => $this->input->post('ktp'),
					'sex' => $this->input->post('sex'),
					'agama' => $this->input->post('agama'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tanggal_lahir' =>$this->input->post('tanggal_lahir'),
					'hp' => $this->input->post('hp'),
					'alamat' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'nama_ayah' => $this->input->post('nama_ayah'),
					'nama_ibu' => $this->input->post('nama_ibu'),
					'alamat_ortu' =>  $this->input->post('alamat_ortu'),
					'hp_ortu' => $this->input->post('hp_ortu'),
					'status' =>'calon',
					'status_daftar' => 'n',
					'tgl_insert' => date('Y-m-d H:i:s'),
					'tgl_update' =>date('Y-m-d H:i:s')
				);
				$exec=$this->model_klien->daftar($d);
				if ($exec) {
					echo "Berhasil Mendaftar";
				}
				$id = $this->db->insert_id();
				redirect(base_url("index.php/pendaftaran/pendaftaransukses?id=$id"));

			}
		} else {
			// $d['tgl_hari'] = hari_ini(date('w'));
			// $d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d = array(
					'nama' => '',
					'ktp' => '',
					'sex' => '',
					'agama' => '',
					'tempat_lahir' => '',
					'tanggal_lahir' => '',
					'hp' => '',
					'alamat' => '',
					
					'kota' => '',
					'peringatan' => '',
			);
			// $d['data_status'] = $this->model_data->status_klien();
			$d['data_agama'] = $this->model_data->agama();
			$d['data_kota'] = $this->model_data->kota();

				$this->load->view('pendaftaran', $d);	
		}
	}

	public function pendaftaransukses()
	{
		if ($this->input->get('id')){
			$id = $this->input->get('id');
			$exec = $this->model_klien->ada2($id); 
			if ($exec){
				$d['idpendaftaran'] = $id;
				$this->load->view('pendaftaran_sukses', $d);	
			} else {

			}
		} else {

		}
	
	}

}