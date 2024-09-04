<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Tambah Data Barang</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="<?= base_url('barang/index'); ?>">Barang</a></li>
				<li class="breadcrumb-item active">Tambah Barang</li>
			</ol>

			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="pemasok">Pemasok</label>
					<select name="pemasok" id="pemasok" class="form-control">
						<option value="">-- Pilih Pemasok --</option>
						<?php foreach ($pemasok as $p) : ?>
							<option value="<?= $p['pemkode'] ?>"><?= $p['pemnama']; ?></option>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('pemasok'); ?></small>
				</div>
				<div class="form-group">
					<label for="kode">Kode Barang</label>
					<input type="text" name="kode" id="kode" class="form-control" readonly="" value="K<?= sprintf("%04s", $kdbrg); ?>">
					<small class="muted text-danger"><?= form_error('kode'); ?></small>
				</div>
				<div class="form-group">
					<label for="nama">Nama Barang</label>
					<input type="text" name="nama" id="nama" class="form-control">
					<small class="muted text-danger"><?= form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label for="ukuran">Ukuran</label>
					<input type="text" name="ukuran" id="ukuran" class="form-control">
					<small class="muted text-danger"><?= form_error('ukuran'); ?></small>
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<select name="kategori" id="kategori" class="form-control">
						<option value="">-- Pilih Kategori --</option>
						<?php foreach ($kategori as $k) : ?>
							<option value="<?= $k['katid'] ?>"><?= $k['katnama']; ?></option>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('kategori'); ?></small>
				</div>
				<div class="form-group">
					<label for="satuan">Satuan</label>
					<select name="satuan" id="satuan" class="form-control">
						<option value="">-- Pilih Satuan --</option>
						<?php foreach ($satuan as $s) : ?>
							<option value="<?= $s['satid'] ?>"><?= $s['satnama']; ?></option>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('satuan'); ?></small>
				</div>
				<div class="form-group">
                            <label>Foto Barang</label>
                            <input type="file" class="form-control-file" name="file1">
							<small class="muted text-danger"><?= form_error('file_check'); ?></small>
                        </div>
				<div class="form-group">
					<label for="hrg_beli">Harga Beli</label>
					<input type="text" name="hrg_beli" id="hrg_beli" class="form-control">
					<small class="muted text-danger"><?= form_error('hrg_beli'); ?></small>
				</div>
				<div class="form-group">
					<label for="hrg_jual">Harga Jual</label>
					<input type="text" name="hrg_jual" id="hrg_jual" class="form-control">
					<small class="muted text-danger"><?= form_error('hrg_jual'); ?></small>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</main>