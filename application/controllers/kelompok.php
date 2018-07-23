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
			$d['class'] = 'Pembinaan'; 
			$d['judul'] = 'Kondisi Kelompok Belajar';
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
				$d['class'] = 'Pembinaan'; 
				$d['judul'] = 'Penempatan Kelompok Belajar "'.$d['rombel']->rombel.'"';
				$d['content'] = 'kelompok/klien';
				$d['data'] = $this->model_kelompok->dataklien($id_rombel);
				$this->load->view('home', $d);	
			} else {
				redirect('kelompok','refresh');
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
					$d['class'] = 'Pembinaan'; 
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
				$d['class'] = 'Pembinaan'; 
				$d['judul'] = 'Jadwal "'.$d['rombel']->rombel.'"';
				$d['content'] = 'kelompok/jadwal';
				
				$d['datamapel'] = $this->model_kelompok->ambilmapel();
				$d['datainstruktur'] = $this->model_kelompok->ambildatainstruktur();
				$d['dataruangan'] = $this->model_kelompok->ambildataruangan();

				$d['datasenin'] = $this->model_kelompok->ambiljadwal('Senin',$id_rombel);
				$d['dataselasa'] = $this->model_kelompok->ambiljadwal('Selasa',$id_rombel);
				$d['datarabu'] = $this->model_kelompok->ambiljadwal('Rabu',$id_rombel);
				$d['datakamis'] = $this->model_kelompok->ambiljadwal('Kamis',$id_rombel);
				$d['datajumat'] = $this->model_kelompok->ambiljadwal('Jumat',$id_rombel);
				$d['datasabtu'] = $this->model_kelompok->ambiljadwal('Sabtu',$id_rombel);
				$d['dataminggu'] = $this->model_kelompok->ambiljadwal('Minggu',$id_rombel);

				$this->load->view('home', $d);	
			} else {
				redirect('penempatan','refresh');
			}
		}
	}
	
	public function tambahjadwal() {
		$id_tahunakademik = $this->model_tahunakademik->tahunini();
		$id_rombel = $this->input->post('id_rombel');
		$kd_mapel =  $this->input->post('matapelajaran');
		$id_instruktur =  $this->input->post('instruktur');
		$hari =  $this->input->post('hari');
		$jam =  $this->input->post('jam');
		$kd_ruangan =  $this->input->post('ruangan');
		$d = array(
			'id_tahunakademik' => $id_tahunakademik->id_tahunakademik,
			'id_rombel' => $id_rombel,
			'kd_mapel' => $kd_mapel,
			'id_instruktur' => $id_instruktur,
			'hari' => $hari,
			'jam' => $jam,
			'kd_ruangan' => $kd_ruangan,
		);
		$this->model_kelompok->tambahjadwal($d);
		redirect(site_url()."/kelompok/jadwal?as=".$id_rombel."&s=1");
	}
	public function hapusjadwal(){
		$id_jadwal= $this->uri->segment(3);
		$data = $this->model_kelompok->cekjadwal($id_jadwal);
		if ($data->num_rows>0) {
			$this->model_kelompok->hapusjadwal($id_jadwal);
			$data = $data->row();
			redirect("kelompok/jadwal?as=".$data->id_rombel."&s=2",'refresh');
		} 
	}

	public function daftarhadir()
	{
		$id_rombel  = $this->uri->segment(3);
		if ($this->model_kelompok->cekrombel($id_rombel)) {
			$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
			$d['data'] = $this->model_kelompok->dataklien($id_rombel);
			$this->load->view('kelompok/v_daftarhadir',$d);
		} else {
			redirect('kelompok','refresh');
		}
	}

	public function cetakjadwal()
	{
		$id_rombel  = $this->uri->segment(3);
		if ($this->model_kelompok->cekrombel($id_rombel)) {
			$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
			$d['data'] = $this->model_kelompok->cetakjadwal($id_rombel);
			$this->load->view('kelompok/v_cetakjadwal',$d);
		} else {
			redirect('kelompok','refresh');
		}
	}

	public function cetakinstruktur()
	{
	
		$id_rombel  = $this->uri->segment(3);
		if ($this->model_kelompok->cekrombel($id_rombel)) {
			$d['rombel'] = $this->model_kelompok->ambilrombel($id_rombel);
			$d['senin'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'senin');
			$d['selasa'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'selasa');
			$d['rabu'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'rabu');
			$d['kamis'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'kamis');
			$d['jumat'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'jumat');
			$d['sabtu'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'sabtu');
			$d['minggu'] = $this->model_kelompok->cetakabsensiinstruktur($id_rombel,'minggu');
			$this->load->view('kelompok/v_cetakinstruktur',$d);
		} else {
			redirect('kelompok','refresh');
		}
		
	}
}