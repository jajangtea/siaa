<?= $this->extend("layout/tlogin") ?>
<?= $this->section("content") ?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?=base_url('/dashboard')?>" class="h1">SI<b>Manis</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Halaman ini digunakan untuk login alumni</p>

            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="/alumni/auth" method="post">
            <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="text" name="nisn" class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

          
            <!-- /.social-auth-links -->

           
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?= $this->endSection() ?>