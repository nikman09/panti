<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftarberita extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_daftarberita');
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
		} else {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'website'; 
			$d['judul'] = 'Berita';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'daftarberita/v_daftarberita';
			$d['data'] = $this->model_daftarberita->all();
			$this->load->view('home', $d);	
		
	}

	public function tambah()
	{
		if ($this->input->post()){
			$judul = $this->input->post('judul');
			$keterangan = $this->input->post('keterangan');
			$isi = $this->input->post('isi');
			$tanggal = date('Y-m-d');
			$data = array(
				'judul' =>$judul,
				'keterangan' =>$keterangan,
				'isi' =>$isi,
				'tanggal' =>$tanggal
			);
			$this->model_daftarberita->tambahberita($data);
			redirect(site_url('daftarberita/tambah?p=1'));
		}else {
		
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'website'; 
			$d['judul'] = 'Berita';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['content'] = 'daftarberita/v_tambahberita';
			$this->load->view('home', $d);	
		}
	}


	public function hapus(){
	
			$id = $this->uri->segment(3);
			$this->model_daftarberita->hapusberita($id);
			redirect(site_url('daftarberita?p=1'));
			
	}


	public function edit()
	{
	
		if ($this->input->post()){
			$idberita = $this->input->post('idberita');
			$judul = $this->input->post('judul');
			$keterangan = $this->input->post('keterangan');
			$isi = $this->input->post('isi');
			$tanggal = date('Y-m-d');
			$data = array(
				'judul' =>$judul,
				'keterangan' =>$keterangan,
				'isi' =>$isi,
				'tanggal' =>$tanggal
			);
			$this->model_daftarberita->editberita($idberita,$data);
			redirect(site_url("daftarberita/edit/$idberita?p=1"));
		}else {
			$id_berita = $this->uri->segment(3);
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'website'; 
			$d['judul'] = 'Berita';
			$d['nama_klien'] = $this->session->userdata('nama_klien');
			$d['data'] = $this->model_daftarberita->cariberita($id_berita)->row();
			$d['content'] = 'daftarberita/v_editberita';
			$this->load->view('home', $d);	
		}
	}
}