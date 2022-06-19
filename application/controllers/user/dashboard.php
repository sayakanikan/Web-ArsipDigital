<?php 
class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				redirect('welcome');
		}
	}
    
    public function index() {
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar');
        $this->load->view('user/dashboard');
        $this->load->view('template_user/footer');
    }
}
?>