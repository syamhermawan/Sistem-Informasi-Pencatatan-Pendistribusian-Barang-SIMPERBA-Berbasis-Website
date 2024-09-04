<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Ubah Data Menu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/index'); ?>">Menu</a></li>
            <li class="breadcrumb-item active">Ubah Menu</li>
        </ol>
        
				<form action="" method="post">
					<input type="text" name="id" value="<?= $menu['id']; ?>">
					<div class="form-group">
						<label for="menu">Menu</label>
						<input type="text" name="menu" id="menu" class="form-control" value="<?= $menu['menu']; ?>">
						<small class="text-muted"><?= form_error('menu'); ?></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Ubah Data Menu</button>
					</div>
				</form>
    </div>
</main>
                
