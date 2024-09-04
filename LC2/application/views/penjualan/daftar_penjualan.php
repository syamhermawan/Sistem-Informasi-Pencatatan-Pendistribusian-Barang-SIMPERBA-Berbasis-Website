
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Distribusi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('penjualan/daftar_penjualan'); ?>">Penjualan</a></li>
                <li class="breadcrumb-item active">Daftar Distribusi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Daftar Distribusi
                </div>
                <div class="card-body">
                    <div class="row ml-1">
                            <button type="button" name="tgl_laporan" class="btn btn-primary" data-toggle="modal" data-target="#modalperiode">Laporan Per Tanggal</button>
                        
                    </div>
                    <br>
                    <div class="table-responsive">
                        <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;" hidden="true">Tambah Data Barang</a>
                        <table class="table table-bordered table-hover " id="dataPenjualan" width="100%" cellspacing="0">
                            <thead>
                                <?php $role_id = $this->session->userdata('role_id'); ?>
                                <?php if($role_id == 1) { ?>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Jumlah</th>
                                    <th>Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php } else {?>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <!-- <th>Alamat</th>
                                    <th>Telp</th> -->
                                    <th>Jumlah</th>
                                    <!-- <th>Pembayaran</th> -->
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>

                                    <?php }?>
                            </thead>
                            <tbody>
                                <?php
                                if($role_id == 1) {
                                $no = 1;
                                foreach ($penjualan as $b) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_penjualan']; ?></td>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['alamat']; ?></td>
                                        <td><?= $b['telp']; ?></td>
                                        <td>Rp <?= number_format($b['jumlah'], 0, ',', '.'); ?></td>


                                        <?php $bayar = $b['bayar'];
                                        if ($bayar == 0) { ?>
                                            <td class="text-danger font-weight-bold">KREDIT</td>
                                        <?php ;
                                        } else { ?>
                                            <td class="text-success font-weight-bold">CASH</td>
                                        <?php ;
                                        }; ?>
                                        <td><?= date("d M Y", strtotime($b['tanggal'])); ?></td>
                                        <?php $sts = $b['sts'];
                                        if ($sts == 2) { ?>
                                            <td class="text-primary font-weight-bold">PENDING</td>
                                        <?php ;
                                        } else if($sts == 1) { ?>
                                            <td class="text-success font-weight-bold">DONE</td>
                                        <?php ;
                                        } else if($sts == 3) { ?>
                                            <td class="text-warning font-weight-bold">INCOMPLETE</td>
                                        <?php ;
                                        } else { ?>
                                            <td class="text-danger font-weight-bold">CANCEL</td>
                                        <?php ; } ?>
                                        <td>
                                            <a href="<?= base_url('penjualan/detail_penjualan/') . $b['kode_penjualan']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('penjualan/hapus/') . $b['kode_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; 
                            } else {?>
                            <?php 
                            $no = 1;
                                foreach ($penjualan as $b) : ?>
                                    <tr>
                                        
                                        <td><?= $b['kode_penjualan']; ?></td>
                                        <td><?= $b['nama']; ?></td>
                                        
                                        <td>Rp <?= number_format($b['jumlah'], 0, ',', '.'); ?></td>


                                        
                                        <td><?= date("d M Y", strtotime($b['tanggal'])); ?></td>
                                        <?php $sts = $b['sts'];
                                        if ($sts == 2) { ?>
                                            <td class="text-primary font-weight-bold">PENDING</td>
                                        <?php ;
                                        } else if($sts == 1) { ?>
                                            <td class="text-success font-weight-bold">DONE</td>
                                        <?php ;
                                        } else if($sts == 3) { ?>
                                            <td class="text-warning font-weight-bold">INCOMPLETE</td>
                                        <?php ;
                                        } else if($sts == 4) { ?>
                                            <td class="text-info font-weight-bold">DIKIRIMKAN</td>
                                        <?php ; } else { ?>
                                            <td class="text-danger font-weight-bold">CANCEL</td>
                                        <?php ; } ?>
                                        <td>
                                            <a href="<?= base_url('penjualan/detail_penjualan/') . $b['kode_penjualan']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('penjualan/hapus/') . $b['kode_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('penjualan/daftar_kredit'); ?>" class="btn btn-primary" style="margin-bottom: 10px;" >Daftar Kredit</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalperiode">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukan Tanggal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('penjualan/print_penjualan') ?>" method="post">

                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Dari Tanggal</label>
                                </div>
                            </td>
                            <td valign="top" width="20">
                                <div class="form-group">
                                    :
                                </div>
                            </td>
                            <td valign="top">
                                <div class="form-group">
                                    <input type="date" name="tgl_1" id="tanggal" class="form-control" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                </div>
                            </td>
                            <td valign="top" width="20">
                                <div class="form-group">
                                    :
                                </div>
                            </td>
                            <td valign="top">
                                <div class="form-group">
                                    <input type="date" name="tgl_2" id="tanggal2" class="form-control" required>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="modal-footer">
                        <input type="submit" name="laporanPeriode" class="btn btn-primary" value="Cetak" target="__blank">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
    </main>