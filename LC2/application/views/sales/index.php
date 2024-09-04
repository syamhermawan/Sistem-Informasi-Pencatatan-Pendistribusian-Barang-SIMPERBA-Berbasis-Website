<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Halaman Sales</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <?= $this->session->flashdata('pesan'); ?>
				
        <?php foreach ($barang as $b) : ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/') ?>img/produk/<?= $b['gambar']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $b['nama_brg']; ?></h5>
                <p class="card-text">Sisa Stok : <?= $b['stok']; ?></p>
              </div>
        </div>
        <?php endforeach; ?>

</main>
                
