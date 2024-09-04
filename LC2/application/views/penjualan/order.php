<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('konsumen/index'); ?>">Konsumen</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
            <?php

            if (isset($_POST['simpanPenjualan'])) {
                $kode = $_POST['simpanPenjualan'];
                $idkonsumen = $konsumen['konkode'];
                $konnama = $konsumen['konnama'];
                $lp = $this->db->query("SELECT * FROM penjualan2 WHERE penjualan2.id_konsumen = '$idkonsumen' AND penjualan2.bayar = 0")->row_array();
                $stsalert = $lp['sts'];
                if ((int)$stsalert == 2) {
                    echo '<div class="alert alert-danger" role="alert">
                    Konsumen Atas Nama ' . $konnama . ' Terdaftar Masih Pending dan Perlu Tindakan Admin.
                    </div>';
                } else if ((int)$stsalert == 3) {
                    echo '<div class="alert alert-danger" role="alert">
                    Konsumen Atas Nama ' . $konnama . ' Terdaftar Memiliki Pembayaran yang Harus di Lunasi.
                    </div>';
                }
            }
            ?>
            <input type="hidden" name="id" value="<?= $konsumen['konkode']; ?>">
            <table class="table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="kode">Nama</label>
                            <input type="text" name="kode" id="kode" class="form-control" readonly="" value="<?= $konsumen['konnama']; ?>">
                            <small class="text-muted"><?= form_error('kode'); ?></small>
                        </div>

                    </td>
                    <td>
                        <div class="form-group">
                            <label for="telp">Telpon</label>
                            <input type="text" name="telp" id="telp" class="form-control" readonly="" value="<?= $konsumen['konnotelp']; ?>">
                            <small class="text-muted"><?= form_error('telp'); ?></small>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" readonly="" value="<?= $konsumen['konalamat']; ?>">
                            <small class="text-muted"><?= form_error('alamat'); ?></small>
                        </div>
                    </td>
                </tr>

            </table>
            <hr>

            <?php
            $queryNamaProduk = " SELECT * FROM barang";
            $barang = $this->db->query($queryNamaProduk)->result_array();

            $querySatuan = " SELECT * FROM satuan";
            $satuan = $this->db->query($querySatuan)->result_array();

            // if (isset($_GET['kbarang'])) {
            //     $cari = '%' . $_POST['kbarang'] . '%';
            //     //$qcari = "SELECT * FROM `barang` WHERE barang.nama_brg LIKE '$cari'";
            //     $qcari2 = $this->db->query("SELECT * FROM `barang` WHERE barang.nama_brg LIKE '$cari'");
            // }
            ?>
            <div class="card card-primary card-outline" id="df">
                <div class="card-body baru-data">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="kpenjualan">No. Transaksi :</label>
                        </div>
                        <div class="col-lg-10 input-group">
                            <label name="kpenjualan" value="P<?= sprintf("%04s", $kode_penjualan); ?>">P<?= sprintf("%04s", $kode_penjualan); ?></label>
                        </div>
                        <div class="col-lg">
                            <form action="<?= base_url('penjualan/order/'); ?><?= $konsumen['konkode']; ?>" method="post">
                                <div class="col-lg-10">
                                    <!-- <div class="input-group" style="margin-top: 10px;">
                                        <input type="text" class="form-control" placeholder="Cari Barang..." name="barangCari" autocomplete="off" autofocus="on">
                                        <span class="input-group-btn">
                                            <input class="btn btn-primary" name="cariBarang" type="submit" value="Cari">
                                        </span>
                                    </div> -->
                                    <!-- /input-group -->
                                    <div class="input-group" style="margin-top: 10px;">
                                            <select name="order_brg" id="order_brg" class="form-control">
                                                <option value="" selected>-- Pilih Barang --</option>
                                                <?php foreach ($dataCari as $b) : ?>
                                                <option value="<?= $b['kode_brg'] ?>"><?= $b['nama_brg'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="input-group-btn">
                                            <button type="submit"  name="submit_order_brg" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Tambah</button>
                                        </span>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?= base_url('penjualan/order/'); ?><?= $konsumen['konkode']; ?>" method="POST">
                        
                        <table class="table table-sm table-bordered table-hover" id="tablePenjualan">
                            <thead>
                                <tr class="table-success">
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Ukuran</th>
                                    <th>Harga Jual</th>
                                    <th>Disc</th>
                                    <th>Qty</th>
                                    <th readonly="true">Total</th>
                                    <th class="col-lg-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['order_brg'])) {
                                    $idkonsumen = $konsumen['konkode'];
                                    $kpenjualan = 'P' . sprintf("%04s", $kode_penjualan);
                                    $data1 = $_POST['order_brg'];
                                    $qget = $this->db->query("SELECT * FROM `barang` WHERE barang.kode_brg = '$data1'")->row_array();
                                    // var_dump($qget);
                                    // die;
                                    $qins = $this->db->query("INSERT INTO detail_penjualan VALUES (
                                            null, 
                                            '$idkonsumen',
                                            '$kpenjualan',
                                            '$qget[kode_brg]',
                                            '$qget[nama_brg]',
                                            '$qget[ukuran]',
                                            $qget[id_kategori],
                                            $qget[id_satuan],
                                            $qget[hrgjual],
                                            0,
                                            0,
                                            0)");
                                }

                                if (isset($konsumen['konkode'])) {
                                    $this->session->unset_userdata('barangCari');
                                    $idkonsumen = $konsumen['konkode'];
                                    $kpenjualan = 'P' . sprintf("%04s", $kode_penjualan);
                                    $dselect = $this->db->query("SELECT * FROM `detail_penjualan` WHERE detail_penjualan.konkode = '$idkonsumen' AND detail_penjualan.id_penjualan = '$kpenjualan' ");
                                    $no = 1;
                                    foreach ($dselect->result_array() as $s) : ?>
                                        <tr>
                                            <td><?= $s['kode_brg']; ?></td>
                                            <td><?= $s['nama_brg']; ?></td>
                                            <td><?= $s['ukuran']; ?></td>
                                            <td><?= $s['hrgjual']; ?></td>
                                            <td class="col-lg-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control col-lg-6" name="kodBarang" value="<?= $s['kode_brg']; ?>" hidden>
                                                    <input type="text" class="form-control col-lg-6" name="disc" value="<?= $s['disc']; ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-success" name="addQty" type="submit" value="<?= $s['id'] ?>"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="col-lg-2">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control col-lg-6" name="kodBarang" value="<?= $s['kode_brg']; ?>" hidden>
                                                    <input type="text" class="form-control col-lg-6" name="jml" value="<?= $s['qty']; ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-success" name="addQty" type="submit" value="<?= $s['id'] ?>"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $s['total']; ?></td>
                    </form>

                    <form action="<?= base_url('penjualan/order/'); ?><?= $konsumen['konkode']; ?>" method="POST">
                        <td>
                            <input type="text" class="form-control col-lg-6" name="kodBarang2" value="<?= $s['kode_brg']; ?>" hidden>
                            <input type="text" class="form-control col-lg-6" name="jml2" value="<?= $s['qty']; ?>" hidden>
                            <button type="submit" name="delBarang" class="btn btn-danger" value="<?= $s['id'] ?>"><i class="fa fa-minus"></i></button>
                        </td>
                    </form>
                    </tr>
            <?php endforeach;
                                }

            ?>
            <?php
            if (isset($_POST['addQty'], $_POST['jml'], $_POST['kodBarang'])) {
                $id = $_POST['addQty'];
                $jml =  $_POST['jml'];
                $kbrg = $_POST['kodBarang'];
                $disc = $_POST['disc'];
                $see3 = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$kbrg'")->row_array();
                $jmlqty3 = $see3['stok'];
                $hrgbrg2 = $see3['hrgbeli'];
                $see = $this->db->query("SELECT * FROM detail_penjualan WHERE detail_penjualan.id = '$id'")->row_array();
                $harga = $see['hrgjual'];
                $hrgsetdisc = $see['hrgjual'] - $disc;
                $jmlqty = $see['qty'];

                if ((int)$jmlqty3 <= (int)$jml) {
                    echo '<div class="alert alert-danger" role="alert">
                    Stok Barang Tidak Cukup.
                    </div>';
                } else if ((int)$jmlqty3 >= (int)$jml) {

                    if ((int)$hrgbrg2 >= (int)$hrgsetdisc) {
                        echo '<div class="alert alert-danger" role="alert">
                    Diskon Terlalu Tinggi.
                    </div>';
                    } else if ((int)$hrgbrg2 <= (int)$hrgsetdisc) {

                        $qupdate = $this->db->query("UPDATE detail_penjualan SET detail_penjualan.total = ($harga - $disc ) * $jml,
                                                                                     detail_penjualan.qty = $jml,
                                                                                     detail_penjualan.disc = $disc WHERE detail_penjualan.id = $id");
                        $see2 = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$kbrg'")->row_array();
                        $jmlqty2 = $see2['stok'];
                        $brgupdate = $this->db->query("UPDATE barang SET barang.stok = ($jmlqty + $jmlqty2) - $jml WHERE barang.kode_brg = '$kbrg'");

                        redirect('penjualan/order/' . $konsumen['konkode']);
                    }
                }
            }
            if (isset($_POST['delBarang'], $_POST['jml2'], $_POST['kodBarang2'])) {
                $ddel = $_POST['delBarang'];
                $djml = $_POST['jml2'];
                $dkbrg = $_POST['kodBarang2'];
                $see2 = $this->db->query("SELECT * FROM barang WHERE barang.kode_brg = '$dkbrg'")->row_array();
                $jmlqty2 = $see2['stok'];
                $brgupdate = $this->db->query("UPDATE barang SET barang.stok = $jmlqty2 + $djml WHERE barang.kode_brg = '$dkbrg'");
                $qddel = $this->db->query("DELETE FROM detail_penjualan WHERE detail_penjualan.id = '$ddel'");
                redirect('penjualan/order/' . $konsumen['konkode']);
            }

            $kode_p = 'P' . sprintf("%04s", $kode_penjualan);
            $sum = $this->db->query("SELECT SUM(detail_penjualan.total) FROM detail_penjualan WHERE detail_penjualan.id_penjualan = '$kode_p'")->row_array();
            $sum3 = $sum['SUM(detail_penjualan.total)'];
            // var_dump($sum3);
            // die;
            if (isset($_POST['simpanPenjualan'], $_POST['bayar'], $_POST['tempo'])) {
                

                $kode = $_POST['simpanPenjualan'];
                $idkonsumen = $konsumen['konkode'];
                $konnama = $konsumen['konnama'];
                $alamat = $konsumen['konalamat'];
                $telp = $konsumen['konnotelp'];
                $bayar = $_POST['bayar'];
                $tempo = $_POST['tempo'];
                $sts = 2;
                $lp = $this->db->query("SELECT * FROM penjualan2 WHERE penjualan2.id_konsumen = '$idkonsumen' AND penjualan2.bayar = 0")->row_array();
                $stsalert = $lp['sts'];
                if ((int)$stsalert == 2) {
                    echo '<div class="alert alert-danger" role="alert" hidden>
                    Konsumen Atas Nama ' . $konnama . ' Terdaftar Masih Pending dan Perlu Tindakan Admin.
                    </div>';
                } else if ((int)$stsalert == 3) {
                    echo '<div class="alert alert-danger" role="alert" hidden>
                    Konsumen Atas Nama ' . $konnama . ' Terdaftar Memiliki Pembayaran yang Harus di Lunasi.
                    </div>';
                } else {

                    $qins = $this->db->query("INSERT INTO penjualan2 VALUES (
                        '$kode',
                        '$idkonsumen',
                        '$konnama',
                        '$alamat',
                        '$telp',
                        $sum3,
                        $bayar,
                        NOW(),
                        $sts,
                        '$tempo')");
                    redirect('penjualan/order/' . $konsumen['konkode']);
                }
            }
            ?>

            </tbody>
            </table>
            <div class="col-lg-2">
                <label for="totalP">Harga Total :</label>
            </div>
            <div class="col-lg-6 input-group">
    <label name="totalP" value=""><?= 'Rp ' . number_format($sum['SUM(detail_penjualan.total)'], 0, ',', '.'); ?></label>
</div>

                </div>
            </div>
            <hr>
            <form method="POST" action="<?= base_url('penjualan/order/'); ?><?= $konsumen['konkode']; ?>">
                <h5>Pembayaran :</h5>
                <select id="bayar" name="bayar" class="custom-select custom-select-lg mb-3">
                    <option selected value="1">CASH</option>
                    <option value="0">KREDIT</option>
                </select>
                <div>
                    <h5>Tempo Kredit :</h5>
                    <input type="text" class="form-control col-lg-6" name="tempo" value="0" hidden>
                    <select id="tempo" name="tempo" class="custom-select custom-select-lg mb-3">
                        <option selected value="0">Pilih Tempo</option>
                        <option value="P3D">3 Hari</option>
                        <option value="P7D">7 Hari</option>
                        <option value="P14D">14 Hari</option>
                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" name="simpanPenjualan" class="btn btn-primary btn-simpan" value="P<?= sprintf("%04s", $kode_penjualan); ?>"><i class="fa fa-save"></i> Submit</button>
                </div>
            </form>

        </div>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#tempo').attr('disabled', true);
            $('#bayar').change(function() {
                $('#tempo').attr('disabled', false);
            });


        });
    </script>