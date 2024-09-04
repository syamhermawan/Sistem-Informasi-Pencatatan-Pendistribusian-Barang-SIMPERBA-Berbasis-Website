<div  id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header" >
                            <center>
                            <img src="assets/img/cvlogo1.png" class="mr-2" width="100" height="100">
                            </center>
                            <h3 class="text-center font-weight-light my-4">Login SIMPERBA</h3>    
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('pesan'); ?>
                            <form action="<?= base_url('auth'); ?>" method="post">
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Username</label>
                                    <input class="form-control py-4" value="<?= set_value('email'); ?>" id="email" name="email" type="text" placeholder="Masukan Username" />
                                    <div class="small mb-3 text-muted"><?= form_error('email'); ?></div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan Password" />
                                    <div class="small mb-3 text-muted"><?= form_error('password'); ?></div>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href=" <?= base_url('auth/daftar') ?>" hidden>Daftar Akun</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
            
