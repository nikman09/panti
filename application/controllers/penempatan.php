<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penempatan extends CI_Controller {	
	

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	    $this->load->model('model_klien');
	    $this->load->model('model_asrama');
	    $this->load->model('model_penempatan');
	    $this->load->model('model_pegawai');
	}


	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pelayanan'; 
			$d['judul'] = 'Kondisi Asrama';

			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'penempatanasrama/asrama';
			$d['data'] = $this->model_penempatan->all();// mengambil semua data program pembinaan
			$d['datapegawai'] = $this->model_pegawai->all();// mengambil semua data program pembinaan
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function klien()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			if ($this->input->get('as')) {
				$id_asrama = $this->input->get('as');
				if ($this->model_penempatan->cekasrama($id_asrama )) {
					if($this->input->get('s')) {
						$s = $this->input->get('s');
						if($s=='1') {
						$d['pesan'] = "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil menempatkan klien</div>";
						} else {
							$d['pesan'] = "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Memindahkan klien</div>";
						}
					} else {
						$d['pesan'] = "";
					}
					$d['asrama'] = $this->model_penempatan->ambilasrama($id_asrama);
					$d['tgl_hari'] = hari_ini(date('w'));
					$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
					$d['class'] = 'Pelayanan'; 
					$d['judul'] = 'Penempatan Klien Asrama "'.$d['asrama']->asrama.'"';
					$d['content'] = 'penempatanasrama/klien';
					$d['data'] = $this->model_penempatan->dataklien($id_asrama);
					$d['data_status'] = $this->model_data->status_klien();
					$d['all_klien'] = $this->model_klien->all();
					$this->load->view('home', $d);	
				} else {
					redirect('penempatan','refresh');
				}
			}

		} else {
			redirect('login','refresh');
		}
	}

	public function tambahklien()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			if ($this->input->get('kd')) {

				$kd = $this->input->get('kd');
				if ($this->input->post()) {
					$idklien = $this->input->post('id_klien');
					$kdasrama =  $this->input->get('kd');
					$d = array(
						'id_klien' => $idklien,
						'kd_asrama' => $this->input->get('kd'),
						'tgl_insert' => date("Y-m-d H:i:s")
					);
					$this->model_penempatan->tambahklien($d);

					$dataklien = $this->model_penempatan->ambilklien($idklien);
					$dataasrama = $this->model_penempatan->ambilasrama($kdasrama);
					$datapenempatan = $this->model_penempatan->ambilpenempatan($idklien);
					$da = array(
						'id_penempatan' => $datapenempatan->id_penempatan,
						'id_klien' =>  $idklien,
						'nama_klien' =>  $dataklien->nama_klien,
						'kd_asrama_asal' => "",
						'asrama_asal' => "",
						'kd_asrama_akhir' => $dataasrama->kd_asrama,
						'asrama_akhir' => $dataasrama->asrama,
						'ket' => "tambah",
						'tanggal' => date("Y-m-d H:i:s")
					);
					$this->model_penempatan->tambahriwayat($da);

					redirect(site_url()."/penempatan/klien?as=".$kd."&s=1");
				} else {
					$id_asrama = $this->input->get('kd');
					if ($this->model_penempatan->cekasrama($id_asrama )) {
						
						$d['asrama'] = $this->model_penempatan->ambilasrama($id_asrama);
						$d['tgl_hari'] = hari_ini(date('w'));
						$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
						$d['class'] = 'Pelayanan'; 
						$d['judul'] = 'Penempatan Klien Asrama "'.$d['asrama']->asrama.'"';
						$d['content'] = 'penempatanasrama/tambahklien';
						$d['data'] = $this->model_penempatan->daftarklien();
						$this->load->view('home', $d);	
					} else {
						redirect('penempatan','refresh');
					}
				}
			}

		} else {
			redirect('login','refresh');
		}
	}

	public function hapus(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id_penempatan= $this->uri->segment(3);
			$data = $this->model_penempatan->cekpenempatan($id_penempatan);
			if ($data->num_rows>0) {
				$data = $data->row();
				
				$dataklien = $this->model_penempatan->ambilklien($data->id_klien);
				$dataasrama = $this->model_penempatan->ambilasrama($data->kd_asrama);
				$datapenempatan = $this->model_penempatan->ambilpenempatan($data->id_klien);
				$da = array(
					'id_penempatan' => $datapenempatan->id_penempatan,
					'id_klien' =>  $data->id_klien,
					'nama_klien' =>  $dataklien->nama_klien,
					'kd_asrama_asal' => $dataasrama->kd_asrama,
					'asrama_asal' => $dataasrama->asrama,
					'kd_asrama_akhir' => "",
					'asrama_akhir' => "",
					'ket' => "hapus",
					'tanggal' => date("Y-m-d H:i:s")
				);
				$this->model_penempatan->tambahriwayat($da);

				$this->model_penempatan->delete($id_penempatan);


				redirect("penempatan/klien?as=".$data->kd_asrama."",'refresh');
			} 

		
		} else {
			redirect('login','refresh');
		}	
	}

	public function pindahklien()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			if ($this->input->post()) {
				$kd = $this->input->post('asalasrama');
				$id = $this->input->post('id_penempatan');
				$d = array(
					'kd_asrama' => $this->input->post('pindahasrama'),
					'tgl_insert' => date("Y-m-d H:i:s")
				);
				$this->model_penempatan->update($d,$id);
				
				$datapenempatan = $this->model_penempatan->cekpenempatan($id);
				$datapenempatan = $datapenempatan->row();
				$dataklien = $this->model_penempatan->ambilklien($datapenempatan->id_klien);
				$dataasramaawal = $this->model_penempatan->ambilasrama($kd);
				$dataasramaakhir = $this->model_penempatan->ambilasrama($this->input->post('pindahasrama'));
				$da = array(
					'id_penempatan' => $datapenempatan->id_penempatan,
					'id_klien' =>  $dataklien->id_klien,
					'nama_klien' =>  $dataklien->nama_klien,
					'kd_asrama_asal' => $dataasramaawal->kd_asrama,
					'asrama_asal' => $dataasramaawal->asrama,
					'kd_asrama_akhir' => $dataasramaakhir->kd_asrama,
					'asrama_akhir' => $dataasramaakhir->asrama,
					'ket' => "pindah",
					'tanggal' => date("Y-m-d H:i:s")
				);
				$this->model_penempatan->tambahriwayat($da);

				 redirect(site_url()."/penempatan/klien?as=".$kd."&s=2");
			} else {
				if ($this->input->get('id')) {
					$id=$this->input->get('id');
					$data = $this->model_penempatan->rinciklien($id);
					if ($data->num_rows>0) {
						$data = $data->row();
						$d['asrama'] = $this->model_penempatan->ambilasrama($data->kd_asrama);
						$d['tgl_hari'] = hari_ini(date('w'));
						$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
						$d['class'] = 'Pelayanan'; 
						$d['judul'] = 'Penempatan Klien Asrama "'.$d['asrama']->asrama.'"';
						$d['content'] = 'penempatanasrama/pindahklien';
						$d['data'] = $data;
						$d['daftarasrama'] = $this->model_penempatan->daftarasrama($data->kd_asrama);
						$this->load->view('home', $d);	
					} else {
						redirect("penempatan",'refresh');
					}
				}
			}


		} else {
			redirect('login','refresh');
		}
	}

	public function cari(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['kd_asrama'] = $this->uri->segment(3);

			if ($this->model_asrama->ada($id)){
				$data = $this->model_penempatan->ambilasrama($id['kd_asrama']);
				if ($data->id_pegawai==''){
					$d['id_pegawai'] = '';
					$d['sk'] = '';
					$d['tmt'] = '';
					$d['tanggal_sk'] = '';
				} else {
					if ($this->model_penempatan->ceksk($id['kd_asrama'],$data->id_pegawai)) {
						$dt = $this->model_penempatan->ambilsk($id['kd_asrama'],$data->id_pegawai);
						$d['id_pegawai'] = $dt->id_pegawai;
						$d['sk'] = $dt->sk;
						$d['tmt'] = $dt->tmt;
						$d['tanggal_sk'] = $dt->tgl_sk;
					} else {
						$d['id_pegawai'] = $data->id_pegawai;
						$d['sk'] = '';
						$d['tmt'] = '';
						$d['tanggal_sk'] = '';
					}
				}
			} else {
				$d['id_pegawai'] = '';
				$d['sk'] = '';
				$d['tmt'] = '';
				$d['tanggal_sk'] = '';
			}
			echo json_encode($d);
		} else {
			redirect('login', 'refresh');
		}

	}

	public function pengelola(){
		$id['kd_asrama'] = $this->input->post('kd_asrama');
		$dt['id_pegawai'] = $this->input->post('id_pegawai');
		$dt['kd_asrama'] = $id['kd_asrama'];
		$dt['sk'] = $this->input->post('sk');
		$dt['tmt'] = $this->input->post('tmt');
		if ($this->input->post('tanggal_sk')!='') {
			$dt['tgl_sk'] = tgl_str($this->input->post('tanggal_sk'));
		} else {
			$dt['tgl_sk'] = null;
		}
		$data['id_pegawai'] = $dt['id_pegawai'];

		if ($this->model_pegawai->ada($data)) {
			$this->model_asrama->update(array ('kd_asrama' => $id['kd_asrama']), $data);
			$datapegawai = $this->model_penempatan->ambilpegawai($dt['id_pegawai']);
			$dt['nama_pegawai'] = $datapegawai->nama_pegawai;
			$this->model_penempatan->tambahpenunjukan($dt);
		} 
		else {
			$this->model_asrama->update(array ('kd_asrama' => $id['kd_asrama']), $data);
		}
			echo "Data Sukses Disimpan";

		// }
	}

	public function riwayatpenempatan()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$d['tgl_hari'] = hari_ini(date('w'));
			$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
			$d['class'] = 'Pelayanan'; 
			$d['judul'] = 'Riwayat Penempatan';
			$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
			$d['content'] = 'penempatanasrama/riwayatpenempatan';
			$d['data'] = $this->model_penempatan->riwayat();// mengambil semua data program pembinaan
			$this->load->view('home', $d);	
		} else {
			redirect('login','refresh');
		}
	}

	public function hapusriwayat(){
			$id = $this->uri->segment(3);
			$data = $this->model_penempatan->riwayatcari($id);
			if ($data->num_rows()>0) {
				$this->model_penempatan->deleteriwayat($id);
			} 
			redirect('penempatan/riwayatpenempatan?h=1','refresh');	
	}

	public function riwayatpenempatancetak()
	{
		$d['data'] = $this->model_penempatan->riwayat();// mengambil semua data program pembinaan
		$this->load->view('penempatanasrama/v_laporanriwayat',$d);
	
	}
	public function cetakdataklien()
	{
		$id['kd_asrama'] = $this->uri->segment(3);
		$id_asrama = $id['kd_asrama'];
		if ($this->model_asrama->ada($id)){
			$d['asrama'] = $this->model_penempatan->ambilasrama($id_asrama);
			$d['data'] = $this->model_penempatan->dataklien($id_asrama);;// mengambil semua data program pembinaan
			$this->load->view('penempatanasrama/v_laporanklien',$d);
		} else {
			redirect(site_url('penempatanasrama'));
		}
	}

	public function laporanasrama()
	{
		$d['data'] = $this->model_penempatan->all();
		$this->load->view('penempatanasrama/v_laporanasrama',$d);
		
	}

}