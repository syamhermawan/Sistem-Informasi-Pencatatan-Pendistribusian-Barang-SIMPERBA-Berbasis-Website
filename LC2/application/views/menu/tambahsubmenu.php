<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Data Menu Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/index'); ?>">Menu</a></li>
            <li class="breadcrumb-item active">Tambah Sub Menu</li>
        </ol>
        <form action="" method="post">
        	<div class="form-group">
        		<label for="menu_id">Menu</label>
        		<select name="menu_id" id="menu_id" class="form-control">
        			<option value="">-- Pilih Menu --</option>
        			<?php foreach($menu as $m) : ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
        			<?php endforeach; ?>
        		</select>
        	</div>
        	<div class="form-group">
        		<label for="title">Title</label>
        		<input type="text" name="title" class="form-control">
        		<small class="muted text-danger"><?= form_error('title'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="url">Url</label>
        		<input type="text" name="url" class="form-control">
        		<small class="muted text-danger"><?= form_error('url'); ?></small>
        	</div>
        	<div class="form-group">
        		<label for="icon">Icon</label>
        		<input type="text" name="icon" class="form-control">
        		<small class="muted text-danger"><?= form_error('icon'); ?></small>
        	</div>
        	<div class="form-group">
        		<input type="checkbox" checked="" value="1" name="is_active">
        		<label>Active ?</label>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary">Tambah Data SubMenu</button>
        	</div>
        </form>
    </div>
</main>
                
