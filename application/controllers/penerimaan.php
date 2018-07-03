<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_penerimaan');
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'transaksi'; 
			$d['judul'] = 'Klien';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'penerimaan/view';
			$d['data'] = $this->model_penerimaan->all();
			$d['data_status'] = $this->model_data->status_klien();
			$d['all_klien'] = $this->model_penerimaan->all();
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function cari(){
	
			$id['id_klien'] = $this->uri->segment(3);
			if ($this->model_penerimaan->ada($id)){
				$data = $this->model_penerimaan->ambilklien($id['id_klien']);
				$d['id_klien'] = $data->id_klien;
				$d['nama_klien'] = $data->nama_klien;
				$d['ktp'] = $data->nik;
				$d['jk'] = $data->sex;
				$d['agama'] = $data->agama;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['hp'] = $data->hp;
				$d['alamat'] = $data->alamat;
				$d['kota'] =$data->kota;
				$d['status_daftar'] = $data->status_daftar;
				$d['status'] = $data->status;
				$d['nama_ayah'] = $data->nama_ayah;
				$d['nama_ibu'] =  $data->nama_ibu;
				$d['alamat_ortu'] =   $data->alamat_ortu;
				$d['hp_ortu'] =  $data->hp_ortu;
			} 
			echo json_encode($d);

	}

	public function simpan() {
		$id['id_klien'] = $this->input->post('id_klien');
		$dt['status_daftar'] = $this->input->post('status_daftar');
		$this->model_penerimaan->update($id, $dt);
		echo "Berhasil Merubah Status Daftar";
	}

	public function simpan2() {
		$id['id_klien'] = $this->input->post('id_klien2');
		$dt['status'] = $this->input->post('status2');
		$this->model_penerimaan->update($id, $dt);
		echo "Berhasil Memindahkan Data Klien ";
	}

	public function printpenerimaan(){
	
		$id['id_klien'] = $this->uri->segment(3);
		if ($this->model_penerimaan->ada($id)){
			$d['data'] = $this->model_penerimaan->ambilklien($id['id_klien']);
		} 
		$this->load->view('penerimaan/v_laporan',$d);

	}
}