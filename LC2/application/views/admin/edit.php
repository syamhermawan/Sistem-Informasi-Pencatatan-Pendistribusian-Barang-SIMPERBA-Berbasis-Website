<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Profile</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label  for="email">Email</label>
                    <input class="form-control py-4" id="email" name="email" type="text" readonly="" value="<?= $user['email']; ?>" />
                    <div class="small mb-3 muted text-danger"><?= form_error('email'); ?></div>
                </div>
                <div class="form-group">
                    <label  for="nama">Nama</label>
                    <input class="form-control py-4" id="nama" name="nama" type="text" value="<?= $user['nama']; ?>" />
                    <div class="small mb-3 muted text-danger"><?= form_error('nama'); ?></div>
                </div>
                <div class="form-group">
                    <label  for="foto">Foto</label>
                    <input class="form-control-file py-4" id="foto" name="foto" type="file" />
                    <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" width="100">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </main>