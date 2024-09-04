<?php
class Penjualan_model extends CI_Model
{

    public function getKonsumenById($id)
    {
        return $this->db->get_where('konsumen', ['konkode' => $id])->row_array();
    }

    public function getPenjualanById($id)
    {
        return $this->db->get_where('penjualan2', ['kode_penjualan' => $id])->row_array();
    }

    public function select_detail_penjualan($id)
    {
        $query = "SELECT * FROM detail_penjualan WHERE detail_penjualan.id_penjualan = '$id' ";
        return $this->db->query($query)->result_array();
    }

    public function select_penjualan()
    {
        $query = "SELECT * FROM penjualan2 ";
        return $this->db->query($query)->result_array();
    }

    public function select_periode_penjualan($tgl1,$tgl2)
    {
        $query = "SELECT * FROM penjualan2 WHERE penjualan2.tanggal BETWEEN '$tgl1' AND '$tgl2' ";
        return $this->db->query($query)->result_array();
    }

    public function getBarang($barangCari)
    {
        if ($barangCari) {
            $this->db->like('nama_brg', $barangCari);
        }
        return $this->db->get('barang')->result_array();
    }

     public function addPenjualan($submitCari, $idPenjualan, $konsumen)
    {



         $data = [
             'id' => $this->input->post(null, true),
             'konkode' => $this->input->post($konsumen, true),
             'id_penjualan' => $this->input->post($idPenjualan, true),
             'kode_brg' => $this->input->post($qget['kode_brg'], true),
             'nama_brg' => $this->input->post($qget['nama_brg'], true),
             'ukuran' => $this->input->post($qget['ukuran'], true),
             'id_kategori' => $this->input->post($qget['id_kategori'], true),
             'id_satuan' => $this->input->post($qget['id_satuan'], true),
            'hrgjual' => $this->input->post($qget['hrgjual'], true),
             'qty' => $this->input->post(1, true),
             'total' => $this->input->post($qget['hrgjual'], true),
         ];
         $this->db->insert('detail_penjualan', $data);
     }

    public function cekKodePenjualan()
    {
        $query = $this->db->query("SELECT MAX(kode_penjualan) as kodepenjualan FROM penjualan2");
        $hasil = $query->row();
        return $hasil->kodepenjualan;
    }
}
