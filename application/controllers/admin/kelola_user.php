<?php 
class Kelola_user extends CI_Controller{
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
        $data['user'] = $this->model_arsip->get_data('tb_user')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/akun_user', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_user() {
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_tambah_user');
        $this->load->view('template_admin/footer');
    }

    public function tambah_user_aksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_user();
        }else{
            $nama           = $this->input->post('nama');
            $nip            = $this->input->post('nip');
            $agama          = $this->input->post('agama');
            $ttl            = $this->input->post('ttl');
            $gender         = $this->input->post('gender');
            $alamat         = $this->input->post('alamat');
            $telpon         = $this->input->post('telpon');
            $bagian         = $this->input->post('bagian');
            $email          = $this->input->post('email');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $foto_profil    = $_FILES['foto_profil']['name'];
            if($foto_profil=''){}else{
                $config['upload_path']      = 'assets/upload/profil_admin';
                $config['allowed_types']    = 'jpg|jpeg|png|jfif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto_profil')){
                    echo "Foto Profil Gagal Diupload!";
                }else{
                    $foto_profil = $this->upload->data('file_name');
                }
            }
            $role_id        = '2';

            $cekuser        = $this->model_arsip->cek_username_user($username);
            if ($cekuser == TRUE){
                $this->session->set_flashdata('pesan6','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username telah terpakai, Silahkan gunakan username lain.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/kelola_user');
            }else{
                $data = array(
                    'nama'          => $nama,
                    'nip'           => $nip,
                    'agama'         => $agama,
                    'ttl'           => $ttl,
                    'gender'        => $gender,
                    'alamat'        => $alamat,
                    'telpon'        => $telpon,
                    'bagian'        => $bagian,
                    'email'         => $email,
                    'username'      => $username,
                    'password'      => $password,
                    'foto_profil'   => $foto_profil,
                    'role_id'       => $role_id
                );

                $this->model_arsip->insert_data($data,'tb_user');
                $this->session->set_flashdata('pesan6','<div class="alert alert-success alert-dismissible fade show" role="alert">
                User Baru Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/kelola_user');
            }
        }
    }

    public function edit($id) {
        $where = array('id_user' => $id);
        $data['user'] = $this->db->query("SELECT * FROM tb_user WHERE id_user = '$id'")->result();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/form_edit_user', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit_user_aksi(){
        $id             = $this->input->post('id_user');
        $nama           = $this->input->post('nama');
        $nip            = $this->input->post('nip');
        $agama          = $this->input->post('agama');
        $ttl            = $this->input->post('ttl');
        $gender         = $this->input->post('gender');
        $alamat         = $this->input->post('alamat');
        $telpon         = $this->input->post('telpon');
        $bagian         = $this->input->post('bagian');
        $email          = $this->input->post('email');
        $username       = $this->input->post('username');
        $foto_profil    = $_FILES['foto_profil']['name'];
        if($foto_profil){
            $config['upload_path']      = 'assets/upload/profil_user';
            $config['allowed_types']    = 'jpg|jpeg|png|tiff';

            $this->load->library('upload', $config);
            if($this->upload->do_upload('foto_profil')){
                $foto_profil = $this->upload->data('file_name');
                $this->db->set('foto_profil', $foto_profil);
            }else{
                echo $this->upload->display_error();
            }
        }

        $data = array(
            'nama'          => $nama,
            'nip'           => $nip,
            'agama'         => $agama,
            'ttl'           => $ttl,
            'gender'        => $gender,
            'alamat'        => $alamat,
            'telpon'        => $telpon,
            'bagian'        => $bagian,
            'username'      => $username,
        );

        $where = array(
            'id_user'   => $id
        );

        $this->model_arsip->update_data($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan6','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data User Berhasil Diupdate!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kelola_user');
    }

    public function _rules(){
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nip','NIP','required');
        $this->form_validation->set_rules('agama','Agama','required');
        $this->form_validation->set_rules('ttl','TTL','required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('telpon','Telpon','required');
        $this->form_validation->set_rules('bagian','Bagian','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
    }

    public function hapus($id) {
        $where = array('id_user' => $id);
        $this->model_arsip->delete_data($where, 'tb_user');
        $this->session->set_flashdata('pesan6','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Akun User Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kelola_user');
    }

    public function detail($id) {
        $data['detail'] = $this->model_arsip->ambil_id_user($id);
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/detail_user', $data);
        $this->load->view('template_admin/footer');
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $data['user'] = $this->model_arsip->get_user_keyword($keyword);
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/akun_user', $data);
        $this->load->view('template_admin/footer');
    }
}
?>