<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {	
	 
	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('model_data');
	}

	public function index()
	{
		$d['tgl_hari'] = hari_ini(date('w'));
		$d['tgl_indo'] = tgl_indo(date('Y-m-d'));
		$d['class'] = 'home'; 
		$d['judul'] = 'Edit Profile';

		$d['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$d['content'] = 'profil/profil';
		$this->load->view('home', $d);	
	}

	public function simpan_profil(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
			$id['username'] = $this->session->userdata('username');
			$q = $this->db->get_where('admins', $id);
			if ($q->num_rows() > 0) {
				$this->db->update('admins', $dt, $id);
				echo "Nama lengkap berhasil diubah";
			}

		} else {
			redirect('login', 'refresh');
		}
	}

	public function simpan_foto(){
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$key = $this->session->userdata('id_username');

			$config['upload_path'] = './assets/avatars';
			$config['allowed_types'] = "bmp|gif|jpg|jpeg|png";
			$config['overwrite'] = true;
			$config['file_name'] = $key;

			$this->load->library('upload', $config);

			$foto = $_FILES['gambar']['name'];

			if (!empty($foto)) {
				if ($this->upload->do_upload('gambar')){
					$data = $this->upload->data();
					$filename = $data['file_name'];
					$d['foto'] = $filename;

					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/avatars/'.$filename;
					$config['create_thumb'] = false;
					$config['maintain_ratio'] = true;
					$config['width'] = 300;
					$config['height'] = 200;


					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$id['username'] = $this->session->userdata('username');
					$q = $this->db->get_where('admins', $id);
					$r = $q->num_rows();

					if($r > 0){
						$this->db->update('admins', $d, $id);
						$info = "Sukses diubah";
						$this->session->set_flashdata('result', '<center>'.$info.'</center');
						redirect('profil', 'refresh');
					}
				} else {
					$info = $this->upload->display_errors();
					$this->session->set_flashdata('result_info', '<center>'.$info.'</center>');
				}
				
			}
		}else {
			redirect('login','refresh' );
		}	
	}

	public function simpan_pwd()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if (!empty($cek) && $level=='admin'){
			$id['username'] = $this->session->userdata('username');
			$q = $this->db->get_where('admins', $id);
			$row = $q->row();

			$old_pwd = md5($this->input->post('old_pwd'));

			if ($old_pwd == $row->password){
				$pwd = $this->input->post('pwd_1');
				$dt['password'] = md5($pwd);

				$q = $this->db->get_where('admins', $id);
				$r = $q->num_rows();

				if ($r>0){
					$this->db->update('admins', $dt, $id);
					echo "Password Sukses diubah";
				}
			} else {
				echo "Password lama tidak cocok";
			}
			
		}else {
			redirect('login', 'refresh');
		}
}
}
