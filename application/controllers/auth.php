<?php 
class Auth extends CI_Controller{
	public function index()
	{
		$this->load->view('template_user/header');
		$this->load->view('login');
	}

	public function login(){
		$username   = $this->input->post('username');
		$password   = md5($this->input->post('password'));

		$cek = $this->model_arsip->cek_login($username, $password);
		$cek_admin = $this->model_arsip->cek_login_admin($username,$password);

		if($cek == FALSE && $cek_admin == FALSE){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Username atau password anda salah!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('auth');
		}elseif($cek == TRUE){
			$this->session->set_userdata('username', $cek->username);
			$this->session->set_userdata('role_id', $cek->role_id);
			$this->session->set_userdata('nama', $cek->nama);

			switch ($cek->role_id){
				case 1 :    redirect('admin/dashboard');
							break;
				case 2 :    redirect('user/dashboard');
							break;
				
				default:    break;
			}
		}elseif($cek_admin == TRUE){
			$this->session->set_userdata('username', $cek_admin->username);
			$this->session->set_userdata('role_id', $cek_admin->role_id);
			$this->session->set_userdata('nama_admin', $cek_admin->nama_admin);

			switch ($cek_admin->role_id){
				case 1 :    redirect('admin/dashboard');
							break;
				case 2 :    redirect('user/dashboard');
							break;
				
				default:    break;
			}
		}
    }

    public function _rules(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }


	public function logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }

	public function ganti_password(){
		$this->load->view('template_user/header');
        $this->load->view('ganti_password');
	}

	public function ganti_password_aksi(){
        $pass_baru     = $this->input->post('pass_baru');
        $ulang_pass    = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

		$data    = array('password' =>md5($pass_baru));
		$where   = array('username' =>$this->session->userdata('username'));

		$this->model_arsip->update_password($where, $data, 'tb_admin');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Password berhasil diganti! Silahkan Login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('welcome');
    }

	public function ganti_password_user(){
		$this->load->view('template_user/header');
        $this->load->view('ganti_password');
	}

	public function ganti_password_user_aksi(){
        $pass_baru     = $this->input->post('pass_baru');
        $ulang_pass    = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

		$data    = array('password' =>md5($pass_baru));
		$where   = array('username' =>$this->session->userdata('username'));

		$this->model_arsip->update_password($where, $data, 'tb_user');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Password berhasil diganti! Silahkan Login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('welcome');
    }

	public function forgot(){
		$this->load->view('template_user/header');
		$this->load->view('forgot_password');
	}

	public function forgot_password_aksi(){
		$email	= $this->input->post('email');
		$user 	= $this->db->get_where('tb_user', ['email' => $email])->row_array();
		$admin 	= $this->db->get_where('tb_admin', ['email' => $email])->row_array();

		if($user){
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email'			=> $email,
				'token'			=> $token,
				'date_created'	=> time()
			];

			$this->db->insert('tb_user_token', $user_token);
			$this->_sendEmail($token, 'forgot');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Cek email anda untuk reset password!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('welcome');
		}elseif($admin){
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email'			=> $email,
				'token'			=> $token,
				'date_created'	=> time()
			];

			$this->db->insert('tb_user_token', $user_token);
			$this->_sendEmail($token, 'forgot');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Cek email anda untuk reset password!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('welcome');
		}else{
			$this->session->set_flashdata('pesan404','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Email tidak terdaftar!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('auth/forgot');
		}
	}

	private function _sendEmail($token, $type){
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.googlemail.com',
			'smtp_user'	=> '111201911796@mhs.dinus.ac.id',
			'smtp_pass'	=> 'kucingku1',
			'smtp_port'	=> 465,
			'mail_type'	=> 'html',
			'charset'	=> 'utf-8',
			'newline'	=> "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->from('111201911796@mhs.dinus.ac.id', 'Penolong Lupa Password');
		$this->email->to($this->input->post('email'));
		$this->email->subject('Reset Password E-Arsip');
		$this->email->message('Klik link untuk mereset password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

		if ($this->email->send()){
			return true;
		} else{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function resetPassword(){
		$email	= $this->input->get('email');
		$token	= $this->input->get('token');

		$user	= $this->db->get_where('tb_user', ['email' => $email])->row_array();
		$admin	= $this->db->get_where('tb_admin', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();
			if($user_token){
				if(time() - $user_token['date_created'] < (60*60*24)){
					$this->session->set_userdata('reset_email', $email);
					$this->ganti_password_user();
				}else{
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('tb_user_token', ['email' => $email]);
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Token expired!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('welcome');
				}
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Token salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('welcome');
			}
		}elseif($admin){
			$admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();
			if($admin_token){
				if(time() - $admin_token['date_created'] < (60*60*24)){
					$this->session->set_userdata('reset_email', $email);
					$this->ganti_password();
				}else{
					$this->db->delete('admin', ['email' => $email]);
					$this->db->delete('admin_token', ['email' => $email]);
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Token expired!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('welcome');
				}
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Token salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('welcome');
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Reset Password Gagal, Email salah!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('welcome');
		}
	}
}
?>