<?= $this->extend('tataletak/admin/tataletak_admin') ?>

<?= $this->section('konten') ?>

<form action="" method="post" id="text-editor">
    <input type="hidden" name="id" value="<?= $news['id'] ?>" />
    <div class="form-group">
        <label for="title">NIP</label>
        <input type="text" name="nip" class="form-control" 
            placeholder="" value="<?= $news['nip'] ?>" required>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="email" class="form-control" 
            placeholder="" value="<?= $news['email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="title">Password awal</label>
        <input type="text" name="pass_awal" class="form-control" 
            placeholder="" value="<?= $news['pass_awal'] ?>" required>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="<?= base_url('ngatmin/email') ?>">Batal</a>
    </div>
</form>


<?= $this->endSection() ?>