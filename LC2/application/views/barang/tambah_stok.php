<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('barang/index'); ?>">Barang</a></li>
            <li class="breadcrumb-item active">Tambah Stok</li>
        </ol>
        <form action="" method="post">
            
        <input type="text" name="id" id="id" class="form-control" value="<?= $barang['kode_brg']; ?>" hidden>
        	<div class="form-group">
        		<label for="nama">Nama Pemasok</label>
        		<input type="text" name="nama" id="nama" class="form-control" value="<?= $pemasok ; ?>" readonly>
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="alamat">Nama Barang</label>
        		<input type="text" name="nama" id="nama" class="form-control" value="<?= $barang['nama_brg']; ?>" readonly>
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="stok_sekarang">Stok Saat Ini</label>
        		<input type="text" name="stok_sekarang" id="stok_sekarang" class="form-control" value="<?= $barang['stok']; ?>"readonly>
                <small class="muted text-danger"><?= form_error('stok_sekarang'); ?></small>
        	</div>
            <div class="form-group">
        		<label for="stok_baru">Tambah Stok</label>
        		<input type="text" name="stok_baru" id="stok_baru" class="form-control">
                <small class="muted text-danger"><?= form_error('stok_baru'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary" value="tambah_stok">Tambah</button>
        	</div>
        </form>
    </div>
</main>
                
