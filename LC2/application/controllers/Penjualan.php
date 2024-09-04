<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function order($id)
    {
        $data['judul'] = 'Transaksi Penjualan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['konsumen'] = $this->Penjualan_model->getKonsumenById($id);

        // Ambil data barangCari yang di cari
        if ($this->input->post('cariBarang')) {
            $data['barangCari'] = $this->input->post('barangCari');
            $this->session->set_userdata('barangCari', $data['barangCari']);
        } else {
            $data['barangCari'] = $this->session->userdata('barangCari');
        }

        // cek kode konsumen
        $dariDB = $this->Penjualan_model->cekKodePenjualan();

        // acak kode
        $nourut = substr($dariDB, 3, 4);
        $kodePenjualanSekarang = (int)$nourut + 1;
        $data['kode_penjualan'] = $kodePenjualanSekarang;

        $data['idPenjualan'] = 'P' . $data['kode_penjualan'];


        $data['dataCari'] = $this->Penjualan_model->getBarang($data['barangCari']);
        //$data['submitCari2'] = $this->Penjualan_model->addPenjualan($data['submitCari'], $data['idPenjualan'], $data['konsumen']);

        $this->load->view('themeplates/header', $data);
        $this->load->view('themeplates/sidebar', $data);
        $this->load->view('penjualan/order', $data);
        $this->load->view('themeplates/footer');
    }

    public function detail_penjualan($id)
    {
        $data['judul'] = 'Detail Penjualan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Penjualan_model->getPenjualanById($id);
        $data['detail'] = $this->Penjualan_model->select_detail_penjualan($id);

        $this->load->view('themeplates/header', $data);
        $this->load->view('themeplates/sidebar', $data);
        $this->load->view('penjualan/detail_penjualan', $data);
        $this->load->view('themeplates/footer');
    }

    public function detail_kredit($id)
    {
        $data['judul'] = 'Detail Kredit';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Penjualan_model->getPenjualanById($id);
        $data['detail'] = $this->Penjualan_model->select_detail_penjualan($id);

        $this->load->view('themeplates/header', $data);
        $this->load->view('themeplates/sidebar', $data);
        $this->load->view('penjualan/detail_kredit', $data);
        $this->load->view('themeplates/footer');
    }

    public function daftar_penjualan()
    {
        $data['judul'] = 'Daftar Penjualan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Penjualan_model->select_penjualan();
        $this->load->view('themeplates/header', $data);
        $this->load->view('themeplates/sidebar', $data);
        $this->load->view('penjualan/daftar_penjualan', $data);
        $this->load->view('themeplates/footer');
    }

    public function daftar_kredit()
    {
        $data['judul'] = 'Daftar Kredit';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Penjualan_model->select_penjualan();
        $this->load->view('themeplates/header', $data);
        $this->load->view('themeplates/sidebar', $data);
        $this->load->view('penjualan/daftar_kredit', $data);
        $this->load->view('themeplates/footer');
    }

    public function hapus($id)
    {
        $penjualan = $this->db->query("SELECT * FROM `penjualan2` 
        WHERE penjualan2.kode_penjualan = '$id'")->row_array();

        $detail = $this->db->query("SELECT * FROM `detail_penjualan` 
        WHERE detail_penjualan.id_penjualan = '$id'");
        if($penjualan['sts'] != 0) {
        foreach ($detail->result_array() as $d) :
            $kBarang = $d['kode_brg'];
            $brgqty = $d['qty'];
            $see2 = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$kBarang'")->row_array();
            $jmlqty = $see2['stok'];
            //$this->db->query("UPDATE barang SET barang.stok = $jmlqty + $brgqty WHERE barang.kode_brg = '$kBarang'");
            
        endforeach;
        }
        $this->db->delete('detail_penjualan', ['id_penjualan' => $id]);
        $this->db->delete('penjualan2', ['kode_penjualan' => $id]);
        //$this->db->delete('detail_penjualan', ['id_penjualan' => $id]);
        //$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data konsumen berhasil dihapus.<div>');
        redirect('penjualan/daftar_penjualan');
    }

    public function cancel($id)
    {
        $detail = $this->db->query("SELECT * FROM `detail_penjualan` 
        WHERE detail_penjualan.id_penjualan = '$id'");
        $sts = 0 ;
        $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.sts = $sts WHERE penjualan2.kode_penjualan = '$id'");
        foreach ($detail->result_array() as $d) :
            $kBarang = $d['kode_brg'];
            $brgqty = $d['qty'];
            $see2 = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$kBarang'")->row_array();
            $jmlqty = $see2['stok'];
            $this->db->query("UPDATE barang SET barang.stok = $jmlqty + $brgqty WHERE barang.kode_brg = '$kBarang'");
        endforeach;

        //$this->db->delete('detail_penjualan', ['id_penjualan' => $id]);
        //$this->session->set_flashdata('flashdata', '<div class="alert alert-success" role="alert">Data konsumen berhasil dihapus.<div>');
        redirect('penjualan/daftar_penjualan');
    }

    public function print($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['judul'] = 'Daftar Penjualan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Penjualan_model->getPenjualanById($id);
        $data['detail'] = $this->Penjualan_model->select_detail_penjualan($id);
        $html = $this->load->view('penjualan/print', $data, True);

        $mpdf->WriteHTML("$html");
        $mpdf->Output('Faktur_' . $id. ".pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function print_penjualan()
    {

        $tgl1  = $this->input->post('tgl_1');
        $tgl2  = $this->input->post('tgl_2');

        if (isset($_POST['laporanPeriode'])) {
            $data['tgl1'] = $tgl1;
            $data['tgl2'] = $tgl2;
            $data['judul'] = 'Laporan Penjualan Per';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['penjualan'] = $this->Penjualan_model->select_penjualan();
            $data['laporan_per'] = $this->Penjualan_model->select_periode_penjualan($tgl1, $tgl2);
            $data['sum'] = $this->db->query("SELECT SUM(penjualan2.jumlah) FROM penjualan2 
                                            WHERE penjualan2.tanggal BETWEEN '$tgl1' AND '$tgl2' AND penjualan2.sts > 0 ")->row_array();
            $data['sum2'] = (int)$data['sum'];
            $html = $this->load->view('penjualan/print_laporan', $data, True);

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML("$html");
            $mpdf->Output('Penjualan_'. $tgl1 .'_sd_'. $tgl2 , \Mpdf\Output\Destination::INLINE);
        }
    }
}
