<?= $this->extend('tataletak/admin/tataletak_admin') ?>

<?= $this->section('konten') ?>

<form action="" method="post" id="text-editor">
    <input type="hidden" name="id" value="<?= $news['id'] ?>" />
    <div class="form-group">
        <label for="title">NIP</label>
        <input type="text" name="nip" class="form-control" 
            placeholder="News title" value="<?= $news['nip'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="email" class="form-control" 
            placeholder="News title" value="<?= $news['email'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="title">Password awal</label>
        <input type="text" name="pass_awal" class="form-control" 
            placeholder="News title" value="<?= $news['pass_awal'] ?>" readonly >
    </div>
    
    <div class="form-group">
        <label>Anda yakin? Password akan dikembalikan ke password awal</label><br>
        <button type="submit" class="btn btn-primary">Ya</button>
        <a class="btn btn-secondary" href="<?= base_url('ngatmin/email') ?>">Tidak</a>
    </div>
</form>


<?= $this->endSection() ?>