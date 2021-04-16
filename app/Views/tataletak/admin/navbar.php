<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin') ?>">Admin Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ngatmin/berita') ?>">Berita</a>
                </li>
            </ul>--> 
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('ngatmin/email/baru') ?>" class="btn btn-primary mr-3">Tambah</a>
                </li>
               <!--  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ngatmin/setting') ?>">Setting</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
                </li> 
            </ul>
        </div> -->
    </div>
</nav>