<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admins extends CI_Model {
	//query login 
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		$q_cek_login = $this->db->get_where('admins', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $row)
			{
						$sess_data['id_username'] 	= $row->id_username;
						$sess_data['logged_in'] 	= 'getLoginApeti';
						$sess_data['username'] 		= $row->username;
						$sess_data['nama_lengkap'] 	= $row->nama_lengkap;
						$sess_data['level'] 		= 'admin';

						$this->session->set_userdata($sess_data);
			}

					header('location:'.base_url().'index.php/home');
		} else {


				$this->session->set_flashdata('result_login', '<br> Username / NIP / NIR atau password yang anda masukkan salah');
				header('location:'. base_url(). 'index.php/login');
			}
		
		}
	}

?>