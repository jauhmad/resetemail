<?= $this->extend('tataletak/admin/tataletak_admin') ?>

<?= $this->section('konten') ?>

<form action="" method="post" id="text-editor">
    <div class="form-group">
        <label for="title">NIP</label>
        <input type="text" name="nip" class="form-control" 
            placeholder=""  required>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="email" class="form-control" 
            placeholder=""  required>
    </div>
    <div class="form-group">
        <label for="title">Password awal</label>
        <input type="text" name="pass_awal" class="form-control" 
            placeholder=""  required>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <!-- <button type="submit" name="status" value="draft" class="btn btn-secondary">Batal</button> -->
        <a class="btn btn-secondary" href="<?= base_url('ngatmin/email') ?>">Batal</a>
    </div>
</form>


<?= $this->endSection() ?>