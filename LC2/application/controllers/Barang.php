<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$data['judul'] = 'Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['barang'] = $this->db->get('barang')->result_array();
		$data['barang'] = $this->Barang_model->join3Tabel();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('themeplates/footer');
	}


	public function tambah()
	{
		$data['judul'] = 'Tambah Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();
		$data['pemasok'] = $this->db->get('pemasok')->result_array();

		// acak kode
		$dariDB = $this->Barang_model->cekKodeBarang();
		$noUrut = substr($dariDB, 3, 4);
		$kodeBarangSekarang = $noUrut + 1;
		$data['kdbrg'] = $kodeBarangSekarang;

		$this->form_validation->set_rules('pemasok', 'Pemasok', 'required|trim');
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('hrg_beli', 'Harga Beli', 'required|trim|less_than['.$this->input->post('hrg_jual').']', ['less_than' => 'Harga beli harus lebih kecil dari Harga jual']);
		$this->form_validation->set_rules('hrg_jual', 'Harga Jual', 'required|trim|greater_than['.$this->input->post('hrg_beli').']', ['greater_than' => 'Harga jual harus lebih besar dari Harga beli']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('barang/tambah', $data);
			$this->load->view('themeplates/footer');
		} else {
			$kbrg = $this->input->post('kode');
			$this->Barang_model->tambahBarang();
    

			$config['upload_path']   = './assets/img/produk/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 1024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file1');
            $file1 = $this->upload->data('file_name');
			$data_gambar = array (
			'file1' => $file1,
			);
			$gambar = [
				'gambar' => $file1
			];
			$this->db->where('kode_brg', $kbrg);
			$this->db->update('barang', $gambar);
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil ditambahkan!.</div>');
			redirect('barang');
		}
	}


	public function edit($id)
	{
		$data['judul'] = 'Edit Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();
		$data['pemasok'] = $this->db->get('pemasok')->result_array();
		$data['barang'] = $this->Barang_model->getBarangById($id);
		
		
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
		$this->form_validation->set_rules('hrgbeli', 'Harga Beli', 'required|trim|less_than['.$this->input->post('hrgjual').']', ['less_than' => 'Harga beli harus lebih kecil dari Harga jual']);
		$this->form_validation->set_rules('hrgjual', 'Harga Jual', 'required|trim|greater_than['.$this->input->post('hrgbeli').']', ['greater_than' => 'Harga jual harus lebih besar dari Harga beli']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('barang/edit', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Barang_model->editBarang();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil diedit!.</div>');
			redirect('barang');
		}
	}
	
	public function tambah_stok($id)
	{
		$data['judul'] = 'Edit Barang';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['satuan'] = $this->db->get('satuan')->result_array();
		$data['barang'] = $this->Barang_model->getBarangById($id);
		$querybrg = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$id'")->row_array();
		$kpemasok = $querybrg['pemkode'];
		$id2 = $this->db->query("SELECT * FROM pemasok WHERE pemasok.pemkode = '$kpemasok'")->row_array();

		$data['pemasok'] = $id2['pemnama'];
		
		$this->form_validation->set_rules('stok_baru', 'Stok Baru', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('barang/tambah_stok', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Barang_model->tambahStok();
			$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Stok Barang Berhasil Ditambah</div>');
			redirect('barang');
		}
	}


	public function hapus($id)
	{
		$this->db->delete('barang', ['kode_brg' => $id]);
		$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Barang berhasil dihapus!.</div>');
		redirect('barang');
	}
}
