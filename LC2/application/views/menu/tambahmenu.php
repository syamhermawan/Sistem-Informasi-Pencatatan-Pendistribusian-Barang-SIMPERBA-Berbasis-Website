<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Data Menu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/index'); ?>">Menu</a></li>
            <li class="breadcrumb-item active">Tambah Menu</li>
        </ol>
        
				<form action="" method="post">
					<div class="form-group">
						<label for="menu">Menu</label>
						<input type="text" name="menu" id="menu" class="form-control">
						<small class="text-muted"><?= form_error('menu'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tambah Data Menu</button>
					</div>
				</form>
    </div>
</main>
                
