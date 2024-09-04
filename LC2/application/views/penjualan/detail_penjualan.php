<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('penjualan/daftar_penjualan'); ?>">Daftar Penjualan</a></li>
                <li class="breadcrumb-item active">Penjualan : <?= $penjualan['kode_penjualan']; ?> </li>
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
                                <th>Harga</th>
                                <th>Disc</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $role_id = $this->session->userdata('role_id'); ?>
                            <?php
                            $no = 1;
                            foreach ($detail as $b) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['kode_brg']; ?></td>
                                    <td><?= $b['nama_brg']; ?></td>
                                    <td><?= $b['ukuran']; ?></td>
                                    <td><?= $b['hrgjual']; ?></td>
                                    <td><?= $b['disc']; ?></td>
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
                    <form action="" method="POST">
                        <?php if ($penjualan['sts'] == 0) { ?>
                            <a href="<?= base_url('penjualan/daftar_penjualan'); ?>" name="print" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                            <button name="konfirm" value="<?= $penjualan['kode_penjualan']; ?>" disabled class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-check" aria-hidden="true"></i> Konfirm</button>
                        <?php } else { ?>
                            <a href="<?= base_url('penjualan/daftar_penjualan'); ?>" name="print" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                            <?php if($role_id == 1) { ?>
                                
                            <a href="<?= base_url('penjualan/print/'); ?><?= $penjualan['kode_penjualan']; ?>" name="print" target="__blank" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                           
                            <?php } ?>
                            <?php if ($penjualan['bayar'] == 0) { ?>
                                <button name="incomplete" value="<?= $penjualan['kode_penjualan']; ?>" class="btn btn-warning" style="margin-bottom: 10px;"><i class="fas fa-money-bill-wave-alt"></i> Incomplete</button>
                                <button name="konfirm" value="<?= $penjualan['kode_penjualan']; ?>" disabled class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-check" aria-hidden="true"></i> Konfirm</button>
                            <?php } ?>
                            <?php if($role_id == 1) { ?>
                            <?php if ($penjualan['bayar'] == 1) { ?>
                                <button name="konfirm" value="<?= $penjualan['kode_penjualan']; ?>" class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa fa-check" aria-hidden="true"></i> Konfirm</button>
                            <?php } }?>

                            
                            <?php if($role_id == 2) { ?>
                            <a href="<?= base_url('penjualan/cancel/'); ?><?= $penjualan['kode_penjualan']; ?>" name="cancel" class="btn btn-danger" style="margin-bottom: 10px;"><i class="fa fa-times" aria-hidden="true"></i> Batal</a>
                                <?php } ?>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <?php if (isset($_POST['konfirm'])) {
                $kode_P = $_POST['konfirm'];
                $sts = 1;
                $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.sts = $sts WHERE penjualan2.kode_penjualan = '$kode_p'");
                redirect('penjualan/daftar_penjualan');
            } ?>

            <?php if (isset($_POST['incomplete'])) {
                $kode_P = $_POST['incomplete'];
                $sts = 3;
                $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.sts = $sts WHERE penjualan2.kode_penjualan = '$kode_p'");
                redirect('penjualan/daftar_penjualan');
            } ?>
            <!-- </?php if(isset($_POST['batal'])) {
    $kode_P = $_POST['batal'];
    $sts = 0 ;
    $qup = $this->db->query("UPDATE penjualan2 SET penjualan2.sts = $sts WHERE penjualan2.kode_penjualan = '$kode_p'");
    redirect('penjualan/daftar_penjualan');

} ?> -->
    </main>