<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		hakakses();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konsumen'] = $this->db->get('konsumen')->num_rows();
		$data['pemasok'] = $this->db->get('pemasok')->num_rows();
		$data['barang'] = $this->db->get('barang')->num_rows();
		$data['kategori'] = $this->db->get('kategori')->num_rows();
		$data['satuan'] = $this->db->get('satuan')->num_rows();
		$data['penjualan2'] = $this->db->get('penjualan2')->num_rows();
		$datenow = date("d M Y");
		$data['penjualan'] = $this->db->query("SELECT * FROM penjualan2 WHERE penjualan2.tanggal = '$datenow'AND penjualan2.bayar = 0 AND penjualan2.sts = 0")->num_rows();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function role()
	{
		$data['judul'] = 'Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambahrole()
	{
		$data['judul'] = 'Tambah Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/tambahrole', $data);
			$this->load->view('themeplates/footer');
		} else {
			$role = $this->input->post('role');

			$this->db->insert('user_role', ['role' => $role]);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan!.</div>');
			redirect('admin/role');
		}
	}


	public function ubahrole($id)
	{
		$data['judul'] = 'Ubah Role';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->Admin_model->getRoleById($id);

		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/ubahrole', $data);
			$this->load->view('themeplates/footer');
		} else {
			$id = $this->input->post('id');
			$role = $this->input->post('role');

			$this->db->set('role', $role);
			$this->db->where('id', $id);
			$this->db->update('user_role');
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil diubah!.</div>');
			redirect('admin/role');
		}
	}


	public function hapusrole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Role berhasil dihapus!.</div>');
			redirect('admin/role');
	}


	public function roleaccess($role_id)
	{
		$data['judul'] = 'Role Access';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// mendapatkan role berdasarkan id yang di kirim melalui halaman role.php
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		// agar row admin tidak tampil
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/roleaccess', $data);
		$this->load->view('themeplates/footer');
		
	}


	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
					'role_id' => $role_id,
					'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Akses diganti!.</div>');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');

			// cek gambar
			$upload_foto = $_FILES['foto']['name'];
			// var_dump($upload_foto); die;

			if($upload_foto) {
				$config['upload_path'] = './assets/img/profile';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					// replace/ganti gambar
					$gambar_lama = $data['user']['foto'];
					if($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
					}

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('foto', $gambar_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('tb_user');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit profile berhasil!</div>');
				redirect('admin');
		}
	}

	public function changepassword()
	{
		$data['judul'] = 'Ganti Password';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Ulangi Password', 'required|trim|min_length[3]|matches[password_baru1]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/changepassword', $data);
			$this->load->view('themeplates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if(!password_verify($password_lama, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama yang anda masukan salah!</div>');
				redirect('admin/changepassword');
			} else {
				// cek password baru sama gak dengan password lama, karna tidak boleh sama, pecuma aja ganti passwordnya dong.
				if($password_lama == $password_baru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal mengganti password, password lama sama dengan password baru!</div>');
					redirect('admin/changepassword');
				} else {
					// kalau passwordnya beda
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tb_user');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diganti!</div>');
					redirect('admin/changepassword');
				}
			}
		}
	}

	public function daftar()
	{
		// if($this->session->userdata('email')) {
		// 	redirect('admin');
		// }
		
		$data['judul'] = 'Halaman Daftar';

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.email]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|alpha|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
			['matches' => 'password tidak sama!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/auth_header', $data);
			$this->load->view('admin/daftar');
			$this->load->view('themeplates/auth_footer');
		} else {
			$this->Admin_model->tambahUser();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><a href="#" class="alert-link">Akun berhasil dibuat, silahkan login.</a></div>');
			redirect('admin');
		}
	}

}