<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Edit Data Barang</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item"><a href="<?= base_url('barang/index'); ?>">Barang</a></li>
				<li class="breadcrumb-item active">Edit Barang</li>
			</ol>

			<form action="" method="post">
				<input hidden="true" type="text" name="id" value="<?= $barang['kode_brg']; ?> ">
				<div class="form-group">
					<label for="pemasok">Pemasok</label>
					<select name="pemasok" id="pemasok" class="form-control">
						<option value="">-- Pilih Pemasok --</option>
						<?php

                                                                    use phpDocumentor\Reflection\PseudoTypes\Numeric_;

foreach ($pemasok as $p) : ?>
							<?php if ($p['pemkode'] == $barang['pemkode']) : ?>
								<option value="<?= $p['pemkode'] ?>" selected><?= $p['pemnama']; ?></option>
							<?php else : ?>
								<option value="<?= $p['pemkode'] ?>"><?= $p['pemnama']; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('pemasok'); ?></small>
				</div>
				<div class="form-group">
					<label for="kode">Kode Barang</label>
					<input type="text" name="kode" id="kode" class="form-control" readonly="" value="<?= $barang['kode_brg']; ?>">
					<small class="muted text-danger"><?= form_error('kode'); ?></small>
				</div>
				<div class="form-group">
					<label for="nama">Barang</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?= $barang['nama_brg']; ?>">
					<small class="muted text-danger"><?= form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label for="ukuran">Ukuran</label>
					<input type="text" name="ukuran" id="ukuran" class="form-control" value="<?= $barang['ukuran']; ?>">
					
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<select name="kategori" id="kategori" class="form-control">
						<option value="">-- Pilih Kategori --</option>
						<?php foreach ($kategori as $k) : ?>
							<?php if ($k['katid'] == $barang['id_kategori']) : ?>
								<option value="<?= $k['katid'] ?>" selected><?= $k['katnama']; ?></option>
							<?php else : ?>
								<option value="<?= $k['katid'] ?>"><?= $k['katnama']; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('kategori'); ?></small>
				</div>
				<div class="form-group">
					<label for="satuan">Satuan</label>
					<select name="satuan" id="satuan" class="form-control">
						<option value="">-- Pilih Satuan --</option>
						<?php foreach ($satuan as $s) : ?>
							<?php if ($s['satid'] == $barang['id_satuan']) : ?>
								<option value="<?= $s['satid'] ?>" selected><?= $s['satnama']; ?></option>
							<?php else : ?>
								<option value="<?= $s['satid'] ?>"><?= $s['satnama']; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<small class="muted text-danger"><?= form_error('satuan'); ?></small>
				</div>
				<div class="form-group">
					<label for="hrgbeli">Harga Beli</label>
					<input type="text" name="hrgbeli" id="hrgbeli" class="form-control" value="<?= $barang['hrgbeli']; ?>">
					<small class="muted text-danger"><?= form_error('hrgbeli'); ?></small>
				</div>
				<div class="form-group">
					<label for="hrgjual">Harga Jual</label>
					<input type="text" name="hrgjual" id="hrgjual" class="form-control" value="<?= $barang['hrgjual'];?>">
					<small class="muted text-danger"><?= form_error('hrgjual'); ?></small>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</main>