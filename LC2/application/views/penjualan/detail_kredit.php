<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('penjualan/daftar_kredit'); ?>">Daftar Kredit</a></li>
                <li class="breadcrumb-item active">No. Kredit : <?= $penjualan['kode_penjualan']; ?> </li>
            </ol>
            <div class="form-group">
                <label for="kode">Nama</label>
                <input type="text" name="kode" id="kode" class="form-control" readonly="" value="<?= $penjualan['nama']; ?>">
                <small class="text-muted"><?= form_error('kode'); ?></small>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" readonly="" value="<?= $penjualan['alamat']; ?>">
                <small class="text-muted"><?= form_error('alamat'); ?></small>
            </div>
            <div class="form-group">
                <label for="telp">Telpon</label>
                <input type="text" name="telp" id="telp" class="form-control" readonly="" value="<?= $penjualan['telp']; ?>">
                <small class="text-muted"><?= form_error('telp'); ?></small>
            </div>
            <hr>
            <?php if ($penjualan['tempo'] != "0") {
                $date1 = $penjualan['tanggal'];
                $date2 = $penjualan['tempo'];
                $sekarang = new Datetime("$date1");
                $penambahan = new DateInterval("$date2");
                $sekarang->add($penambahan); ?>
                <?php if ($sekarang <= new Datetime(date("d M Y"))) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger" role="alert">
                            Jatuh Tempo, Segera Lakukan Pelunasan!
                        </div>
                    </div>
                <?php } else if ($sekarang >= new Datetime(date("d M Y"))) { ?>
                    <div class="form-group">
                        <div class="alert alert-success" role="alert">
                            Dalam Tempo.
                        </div>
                    </div>
                <?php } ?>
            <?php ;
            } ?>

            <h6>Barang yang dipesan :</h6>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Barang</th>
                                <th>Ukuran</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail as $b) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['kode_brg']; ?></td>
                                    <td><?= $b['nama_brg']; ?></td>
                                    <td><?= $b['ukuran']; ?></td>
                                    <td><?= $b['qty']; ?></td>
                                    <td><?= $b['total']; ?></td>
                                </tr>
                            <?php endforeach;
                            ?>
                            <?php
                            $kode_p = $penjualan['kode_penjualan'];
                            $sum = $this->db->query("SELECT SUM(detail_penjualan.total) FROM detail_penjualan WHERE detail_penjualan.id_penjualan = '$kode_p'")->row_array();

                            ?>
                        </tbody>
                    </table>
                    <div>
                        <label for="totalP">Harga Total :</label>
                        <label name="totalP" value=""><?= $sum['SUM(detail_penjualan.total)']; ?></label>
                    </div>

                    <hr>
                    <div>
                    <form action="" method="POST">
                        <h6>Tambah Tempo Kredit :</h6>
                    <?php if ($penjualan['tempo'] != "0") {
                        $date1 = $penjualan['tanggal'];
                        $date2 = $penjualan['tempo'];
                        $sekarang = new Datetime("$date1");
                        $penambahan = new DateInterval("$date2");
                        $sekarang->add($penambahan); ?>
                        <?php if ($sekarang <= new Datetime(date("d M Y"))) { ?>
                            <input type="text" class="form-control col-lg-6" name="tempo_plus" value="0" hidden>
                        <select id="tempo_plus" name="tempo_plus" class="custom-select custom-select-lg mb-3">
                            <option selected value="0">Pilih Tempo</option>
                            <option value="3">3 Hari</option>
                            <option value="7">7 Hari</option>
                            <option value="14">14 Hari</option>
                        </select>
                        <?php } else if ($sekarang >= new Datetime(date("d M Y"))) { ?>
                            <input type="text" class="form-control col-lg-6" name="tempo_plus" value="0" hidden>
                        <select id="tempo_plus" name="tempo_plus" class="custom-select custom-select-lg mb-3" disabled>
                            <option selected value="0">Pilih Tempo</option>
                            <option value="3">3 Hari</option>
                            <option value="7">7 Hari</option>
                            <option value="14">14 Hari</option>
                        </select>
                        <?php } ?>
                    <?php ;
                    } ?>
                        
                    </div>
                    <hr>
                        <a href="<?= base_url('penjualan/daftar_kredit'); ?>" name="print" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <?php if ($penjualan['tempo'] != "0") {
                            $date1 = $penjualan['tanggal'];
                            $date2 = $penjualan['tempo'];
                            $sekarang = new Datetime("$date1");
                            $penambahan = new DateInterval("$date2");
                            $sekarang->add($penambahan); ?>
                        <?php if ($sekarang <= new Datetime(date("d M Y"))) { ?>
                            <button name="konfirm" value="<?= $penjualan['kode_penjualan']; ?>" class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-plus" aria-hidden="true"></i> Tambah Tempo</button>
                            <?php } else if ($sekarang >= new Datetime(date("d M Y"))) { ?>
                                <button name="konfirm" value="<?= $penjualan['kode_penjualan']; ?>" disabled class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-plus" aria-hidden="true"></i> Tambah Tempo</button>
                                <?php } ?>
                                <?php ; } ?>
                        <button name="lunas" value="<?= $penjualan['kode_penjualan']; ?>" class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-check" aria-hidden="true"></i> Lunas</button>
                    </form>
                </div>
            </div>
            <?php if (isset($_POST['konfirm'],$_POST['tempo_plus'])) {
                $kode_P = $_POST['konfirm'];
                (int)$temp_plus = $_POST['tempo_plus'];

                $qpenjualan = $this->db->query("SELECT * FROM penjualan2 WHERE penjualan2.kode_penjualan = '$kode_p'")->row_array();
                $date_lama = $qpenjualan['tempo'];

                $sub1 = $date_lama;
                (int)$sub2 = substr($sub1,1,1);
                $jml_tempo = (int)$sub2 + (int)$temp_plus;
                $make_tempo = 'P'.$jml_tempo.'D';
                $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.tempo = '$make_tempo' WHERE penjualan2.kode_penjualan = '$kode_p'");
                redirect('penjualan/daftar_kredit');
            } ?>

            <?php if (isset($_POST['lunas'])) {
                $kode_P = $_POST['lunas'];
                $sts = 1;
                $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.sts = $sts WHERE penjualan2.kode_penjualan = '$kode_p'");
                redirect('penjualan/daftar_penjualan');
            } ?>
    </main>