<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_instruktur extends CI_Model {
	
	public function all(){
		$this->db->join('pegawai','instruktur.id_pegawai = pegawai.id_pegawai');
		return $this->db->get('instruktur');
	}

	public function pegawai(){
		return $this->db->query("select * from pegawai where not exists  (select * from instruktur where pegawai.id_pegawai=instruktur.id_pegawai) ");
	}

	public function tambahinstruktur($data){
		return $this->db->insert("instruktur",$data);
	}

	public function ada($id){
		$q = $this->db->get_where('instruktur',$id);
		$row = $q->num_rows();
		return $row > 0;
	}
	public function delete($id){
		$this->db->delete("instruktur", $id);
	}
	public function update($id, $dt){
		$this->db->update("instruktur", $dt, $id);
	}

	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		$q_cek_login = $this->db->join('pegawai','instruktur.id_pegawai=pegawai.id_pegawai')->get_where('instruktur', array('username' => $u, 'instruktur.password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $row)
			{
						$sess_data['id_username'] 	= $row->id_instruktur;
						$sess_data['logged_in'] 	= 'getLoginApeti';
						$sess_data['username'] 		= $row->username;
						$sess_data['nama_lengkap'] 	= $row->nama_pegawai;
						$sess_data['level'] 		= 'instruktur';

						$this->session->set_userdata($sess_data);
			}

					header('location:'.base_url().'index.php/homeinstruktur');
		} else {


				$this->session->set_flashdata('result_login', '<br> Username atau password yang anda masukkan salah');
				header('location:'. base_url(). 'index.php/logininstruktur');
			}
		
		}

	
	
}

?>