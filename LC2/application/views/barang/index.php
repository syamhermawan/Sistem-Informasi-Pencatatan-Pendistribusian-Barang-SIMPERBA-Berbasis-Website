<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
            <?= $this->session->flashdata('flashdata'); ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Barang
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="<?= base_url('barang/tambah'); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Data Barang</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <?php 
                                $role_id = $this->session->userdata('role_id');
                                if($role_id == 1) {?>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                   
                                    <th>Barang</th>
                                    <th>Ukuran</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Opsi</th>
                                </tr>
                                <?php } else {?>
                                    <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                   
                                    <th>Barang</th>
                                    <th>Ukuran</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                </tr>
                                    <?php }?>
                            </thead>
                            <tbody>
                                <?php
                                $role_id = $this->session->userdata('role_id');
                                
                                if($role_id == 1) {
                                $no = 1;
                                foreach ($barang as $b) : ?>
                                <?php if($b['stok'] >= 11 && $b['stok'] <= 50) { ?>
                                    <tr class="table-warning">
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_brg']; ?></td>
                                        
                                        <td><?= $b['nama_brg']; ?></td>
                                        <td><?= $b['ukuran']; ?></td>
                                        <td><?= $b['katnama']; ?></td>
                                        <td><?= $b['satnama']; ?></td>
                                        <td>Rp <?= number_format($b['hrgbeli'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= number_format($b['hrgjual'], 0, ',', '.'); ?></td>

                                        <td><?= $b['stok']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/edit/') . $b['kode_brg']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('barang/tambah_stok/') . $b['kode_brg']; ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                            <a href="<?= base_url('barang/hapus/') . $b['kode_brg']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php ;} elseif ($b['stok'] <= 10) { ?>
                                    <tr class="table-danger">
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_brg']; ?></td>
                                        
                                        <td><?= $b['nama_brg']; ?></td>
                                        <td><?= $b['ukuran']; ?></td>
                                        <td><?= $b['katnama']; ?></td>
                                        <td><?= $b['satnama']; ?></td>
                                        <td>Rp <?= number_format($b['hrgbeli'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= number_format($b['hrgjual'], 0, ',', '.'); ?></td>

                                        <td><?= $b['stok']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/edit/') . $b['kode_brg']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('barang/tambah_stok/') . $b['kode_brg']; ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                            <a href="<?= base_url('barang/hapus/') . $b['kode_brg']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                </tr>
                                <?php ;} else { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_brg']; ?></td>
                                       
                                        <td><?= $b['nama_brg']; ?></td>
                                        <td><?= $b['ukuran']; ?></td>
                                        <td><?= $b['katnama']; ?></td>
                                        <td><?= $b['satnama']; ?></td>
                                        <td>Rp <?= number_format($b['hrgbeli'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= number_format($b['hrgjual'], 0, ',', '.'); ?></td>

                                        <td><?= $b['stok']; ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/edit/') . $b['kode_brg']; ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                                            <a href="<?= base_url('barang/tambah_stok/') . $b['kode_brg']; ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                            <a href="<?= base_url('barang/hapus/') . $b['kode_brg']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>

                                <?php } else {?>
                                    <?php foreach ($barang as $b) : ?>
                                    <?php    $no = 1;  ?>  
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['kode_brg']; ?></td>
                                        
                                        <td><?= $b['nama_brg']; ?></td>
                                        <td><?= $b['ukuran']; ?></td>
                                        <td><?= $b['katnama']; ?></td>
                                        <td><?= $b['satnama']; ?></td>
                                        
                                        <td>Rp <?= number_format($b['hrgjual'], 0, ',', '.'); ?></td>

                                        <td><?= $b['stok']; ?></td>
                                        
                                    </tr>
                                <?php endforeach;?>

                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>