<?php 
class Backup extends CI_Controller{
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				redirect('welcome');
		}
	}

    public function index(){
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/backup');
        $this->load->view('template_admin/footer');
    }

    public function download_db(){
        $this->load->dbutil();

        $db_name = 'backup-db-'.$this->db->database.'-on-'.date("d-m-Y").'.sql';

        $prefs = array(
            'format'            => 'zip',
            'filename'          => $db_name,
            'add_insert'        => TRUE,
            'foreign_key_checks'=> FALSE,
        );

        $backup = $this->dbutil->backup($prefs);
        
        $save = 'pathtobkfolder'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->load->helper('download');
        force_download($db_name, $backup);
    }
}
?>