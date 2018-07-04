<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyaluran extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
		$this->load->model('model_tahunakademik');
		$this->load->model('model_penyaluran');
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
		$d['judul'] = 'Penyaluran';
		$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$d['content'] = 'penyaluran/penyaluran';
		$d['data'] = $this->model_penyaluran->datapenyaluran();
		$d['dataklien'] = $this->model_penyaluran->dataklien();
		$d['tahun'] = $this->model_tahunakademik->tahunini()->tahunakademik;
		$this->load->view('home', $d);
	}

	public function tambahpenyaluran() {
		$tgl_disalurkan = tgl_str($this->input->post('tanggal'));
		$id_klien =  $this->input->post('id_klien');
		$nilai =  $this->input->post('nilai');
		$acc_pembinaan =  $this->input->post('acc');
		$d = array(
			'tgl_disalurkan' => $tgl_disalurkan,
			'id_klien' => $id_klien,
			'nilai' => $nilai,
			'acc_pembinaan' => $acc_pembinaan
		);
		$this->model_penyaluran->tambahpenyaluran($d);
		if ($acc_pembinaan=="Y"){
			$this->model_penyaluran->editklien($id_klien,"lulus");
		} else {
			$this->model_penyaluran->editklien($id_klien,"aktif");
		}
		redirect(site_url()."/penyaluran?p=1");
	}

	public function hapuspenyaluran(){
		$id_penyaluran= $this->uri->segment(3);
		$data = $this->model_penyaluran->cekpenyaluran($id_penyaluran);
		if ($data->num_rows>0) {
			$data = $data->row();
			$this->model_penyaluran->editklien($data->id_klien,"aktif");
			$this->model_penyaluran->hapuspenyaluran($id_penyaluran);
			redirect(site_url()."/penyaluran?p=3");
		}
	}

	public function editpenyaluran(){
		$id['id_klien'] = $this->input->post('id_klien2');
		$id['id_penyaluran'] = $this->input->post('id_penyaluran2');
		$dt['nilai'] = $this->input->post('nilai2');
		$dt['acc_pembinaan'] = $this->input->post('acc2');
		$id_penyaluran=	$id['id_penyaluran'];
		$this->model_penyaluran->editpenyaluran($id,$dt);
		if ($dt['acc_pembinaan']=="Y"){
			$this->model_penyaluran->editklien($id['id_klien'],"lulus");
			echo $id['id_klien'];
		} else {
			$this->model_penyaluran->editklien($id['id_klien'],"aktif");
		}
		redirect(site_url()."/penyaluran?p=2");
	}
	public function laporanpenyaluran()
	{
		
		$d['data'] = $this->model_penyaluran->datapenyaluran();
		$this->load->view('penyaluran/v_laporanpenyaluran',$d);
		
	}
}