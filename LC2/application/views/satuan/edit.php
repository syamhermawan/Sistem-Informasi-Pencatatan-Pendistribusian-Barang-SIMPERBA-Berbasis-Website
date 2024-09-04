<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Satuan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('satuan/index'); ?>">Satuan</a></li>
            <li class="breadcrumb-item active">Edit Satuan</li>
        </ol>
        <form action="" method="post">
            <input type="text" name="id" value="<?= $satuan['satid']; ?>">
        	<div class="form-group">
        		<label for="nama">Satuan</label>
        		<input type="text" name="nama" id="nama" class="form-control" value="<?= $satuan['satnama']; ?>">
                <small class="muted text-danger"><?= form_error('nama'); ?></small>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Tambah</button>
        	</div>
        </form>
    </div>
</main>
                
