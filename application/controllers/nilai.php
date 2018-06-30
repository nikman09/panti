<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_nilai');
		$this->load->model('model_rombel');
		$this->load->model('model_kelompok');
		$this->load->model('model_tahunakademik');
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin' || $level='instruktur'){
		} else {
			redirect('login','refresh');
		}
	}


	public function index()
	{	
		$d['tgl_hari'] = hari_ini(date('w'));
		$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
		$d['class'] = 'transaksi'; 
		$d['judul'] = 'Nilai Klien';
		$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$d['content'] = 'nilai/nilai';
		if ($level='instruktur'){
			$id_instruktur = $this->session->userdata('id_username');
			$d['data'] = $this->model_nilai->datapelajaraninstruktur($id_instruktur);
		} else {
			$d['data'] = $this->model_nilai->datapelajaran();
		}
		$d['tahun'] = $this->model_tahunakademik->tahunini()->tahunakademik;
		$this->load->view('home', $d);
	}

	public function inputnilai()
	{
		if ($this->input->get('id')) {
			$id_rombel = $this->input->get('id');
			if ($this->model_kelompok->cekrombel($id_rombel)) {
				$kd_mp = $this->input->get('mp');
				$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
				$d['mapel'] = $this->model_nilai->ambilmapel($kd_mp);
				$d['tgl_hari'] = hari_ini(date('w'));
				$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
				$d['class'] = 'transaksi'; 
				$d['judul'] = 'Input Nilai "'.$d['rombel']->rombel.'" Mata Pelajaran '.$d['mapel']->mapel.'';
				$d['content'] = 'nilai/inputnilai';
				$d['data'] = $this->model_nilai->dataklien($id_rombel,$kd_mp);
				$d['dataklien'] = $this->model_nilai->dataklienada($id_rombel,$kd_mp);
				$this->load->view('home', $d);	
			} else {
				redirect('penempatan','refresh');
			}
		}
	}

	public function tambahnilai() {
		$id_tahunakademik = $this->model_tahunakademik->tahunini();
		$id_rombel = $this->input->post('id_rombel');
		$kd_mp =  $this->input->post('kd_mp');
		$id_klien =  $this->input->post('id_klien');
		$nilai =  $this->input->post('nilai');
		$d = array(
			'id_tahunakademik' => $id_tahunakademik->id_tahunakademik,
			'id_rombel' => $id_rombel,
			'kd_mp' => $kd_mp,
			'id_klien' => $id_klien,
			'nilai' => $nilai
		);
		$this->model_nilai->tambahnilai($d);
		redirect(site_url()."/nilai/inputnilai?id=".$id_rombel."&mp=".$kd_mp."&p=3");
	}

	public function hapusnilai(){
		$id_nilai= $this->uri->segment(3);
		$data = $this->model_nilai->ceknilai($id_nilai);
		if ($data->num_rows>0) {
			$this->model_nilai->hapusnilai($id_nilai);
			$data = $data->row();
			redirect(site_url()."/nilai/inputnilai?id=".$data->id_rombel."&mp=".$data->kd_mp."&p=1");
		}

	}

	public function editnilai(){

		$id['id_nilai'] = $this->input->post('id_nilai');
		$dt['nilai'] = $this->input->post('nilai2');
		$id_nilai=	$id['id_nilai'];
		$data = $this->model_nilai->ceknilai($id_nilai);
		if ($data->num_rows>0) {
			$this->model_nilai->editnilai($id,$dt);
			$data = $data->row();
			redirect(site_url()."/nilai/inputnilai?id=".$data->id_rombel."&mp=".$data->kd_mp."&p=2");
		}
	}


}