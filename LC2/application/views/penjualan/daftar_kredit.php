<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('penjualan/daftar_penjualan'); ?>">Penjualan</a></li>
                <li class="breadcrumb-item active"><?= $judul ?></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    <?= $judul ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;" hidden="true">Tambah Data Barang</a>
                        <table class="table table-bordered table-hover" id="dataKredit" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Tempo</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($penjualan as $b) : 
                                    if ($b['tempo'] != "0") {
                                    $date1 = $b['tanggal'];
                                    $date2 = $b['tempo']; 
                                    ?>
                                    <?php if($b['sts'] != 1) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_penjualan']; ?></td>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['alamat']; ?></td>
                                        <td><?= $b['telp']; ?></td>
                                        <td><?= date("d M Y", strtotime($b['tanggal'])); ?></td>
                                        <td><?= $b['jumlah']; ?></td>
                                        <td>
                                        <?php $sekarang = new Datetime("$date1");
                                        $penambahan = new DateInterval("$date2");
                                        $sekarang->add($penambahan); ?> <?= $sekarang->format('d M Y'); ?>
                                        </td>
                                        <?php if($sekarang <= new Datetime(date("d M Y"))) { ?>
                                           <td class="text-danger"> <i class="fa fa fa-times" aria-hidden="true"></i> Jatuh Tempo </td>

                                        <?php } else if($sekarang >= new Datetime(date("d M Y"))) { ?>
                                            <td class="text-success"> <i class="fa fa fa-check" aria-hidden="true"></i> Aktif </td>
                                        <?php } ?>
                                        <td>
                                            <a href="<?= base_url('penjualan/detail_kredit/') . $b['kode_penjualan']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('barang/hapus/') . $b['kode_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php ;} ;} endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?= base_url('penjualan/daftar_penjualan'); ?>" name="print" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>


    </main>