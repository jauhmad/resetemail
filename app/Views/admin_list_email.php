<?= $this->extend('tataletak/admin/tataletak_admin') ?>

<?= $this->section('konten') ?>

<table class="table">
<thead>
<tr>
    <th>#</th>
    <th>NIP</th>
    <th>Email</th>
    <th>Password Awal</th>
    <th></th>
</tr>
</thead>
<tbody>
<?php foreach($newses as $news): ?>
<tr>
    <td><?= $news['id'] ?></td>
    <td>
        <strong><?= $news['nip'] ?></strong><br>
    </td>
    <td>
       <?= $news['email'] ?>
    </td>
    <td>
       <?= $news['pass_awal'] ?>
    </td>
    <td>
        <!-- <a href="<?= base_url('ngatmin/berita/'.$news['id'].'/lihat') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">Lihat</a> -->
        <a href="<?= base_url('ngatmin/email/'.$news['id'].'/edit') ?>"  class="btn btn-sm btn-outline-secondary">Edit</a>
        <a href="<?= base_url('ngatmin/email/'.$news['id'].'/reset') ?>"  class="btn btn-sm btn-outline-secondary">Reset Password</a>
        <a href="#" data-href="<?= base_url('ngatmin/email/'.$news['id'].'/hapus') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Hapus</a> 
    </td>
</tr>
<?php endforeach ?>
</tbody>
</table>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Anda yakin?</h2>
        <p>Data ingin dihapus</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>


<?= $this->endSection() ?>