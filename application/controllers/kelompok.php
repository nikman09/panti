<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelompok extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_klien');
	    $this->load->model('model_asrama');
	    $this->load->model('model_penempatan');
		$this->load->model('model_pegawai');
	    $this->load->model('model_rombel');
		$this->load->model('model_probi');
		$this->load->model('model_tahunakademik');
		$this->load->model('model_kelompok');
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
			$d['class'] = 'transaksi'; 
			$d['judul'] = 'Kelompok Belajar';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'kelompok/kelompok';
			$d['data'] = $this->model_rombel->all();
			$d['probi'] = $this->model_probi->all2();
			$d['tahun'] = $this->model_tahunakademik->tahunini()->tahunakademik;
			$this->load->view('home', $d);	
		
	}

	public function klien()
	{
		if ($this->input->get('as')) {
			$id_rombel = $this->input->get('as');
			if ($this->model_kelompok->cekrombel($id_rombel)) {
				if($this->input->get('s')) {
					$s = $this->input->get('s');
					if($s=='1') {
						$d['pesan'] = "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menambahkan Klien ke Kelompok  Belajar</div>";
					} else {
						$d['pesan'] = "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Memindahkan klien ke Kelompok  Belajar</div>";
					}
				} else {
					$d['pesan'] = "";
				}
				$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
				$d['tgl_hari'] = hari_ini(date('w'));
				$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
				$d['class'] = 'transaksi'; 
				$d['judul'] = 'Penempatan Klien Kelompok Belajar "'.$d['rombel']->rombel.'"';
				$d['content'] = 'kelompok/klien';
				$d['data'] = $this->model_kelompok->dataklien($id_rombel);
				$this->load->view('home', $d);	
			} else {
				redirect('penempatan','refresh');
			}
		}
	}

	public function tambahklien()
	{
		if ($this->input->get('kd')) {

			$kd = $this->input->get('kd');
			if ($this->input->post()) {
				$id_tahunakademik = $this->model_tahunakademik->tahunini();
				$idklien = $this->input->post('id_klien');
				$kdasrama =  $this->input->get('kd');
				$d = array(
					'id_klien' => $idklien,
					'id_rombel' => $this->input->get('kd'),
					'id_tahunakademik' => $id_tahunakademik->id_tahunakademik
				);
				$this->model_kelompok->tambahklien($d);
				redirect(site_url()."/kelompok/klien?as=".$kd."&s=1");
			} else {
				$id_rombel = $this->input->get('kd');
				if ($this->model_kelompok->cekrombel($id_rombel )) {
					$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
					$d['tgl_hari'] = hari_ini(date('w'));
					$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
					$d['class'] = 'transaksi'; 
					$d['judul'] = 'Penempatan Kelompok Belajar "'.$d['rombel']->rombel.'"';
					$d['content'] = 'kelompok/tambahklien';
					$d['data'] = $this->model_kelompok->daftarklien();
					$this->load->view('home', $d);	
				} else {
					redirect('kelompok','refresh');
				}
			}
		}

	}

	public function hapus(){
		$id_penentuan= $this->uri->segment(3);
		$data = $this->model_kelompok->cekkelompok($id_penentuan);
		if ($data->num_rows>0) {
			$this->model_kelompok->delete($id_penentuan);
			$data = $data->row();
			redirect("kelompok/klien?as=".$data->id_rombel."",'refresh');
		} 
	}

	public function jadwal()
	{
		if ($this->input->get('as')) {
			$id_rombel = $this->input->get('as');
			if ($this->model_kelompok->cekrombel($id_rombel)) {
				$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
				$d['tgl_hari'] = hari_ini(date('w'));
				$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
				$d['class'] = 'transaksi'; 
				$d['judul'] = 'Jadwal "'.$d['rombel']->rombel.'"';
				$d['content'] = 'kelompok/jadwal';
				$this->load->view('home', $d);	
			} else {
				redirect('penempatan','refresh');
			}
		}
	}


}