<!-- newws layout
https://www.petanikode.com/codeigniter4-view-layout/
-->

<?= $this->extend('tataletak/tataletak_berita') ?>

<?= $this->section('konten') ?>

<!--https://www.petanikode.com/codeigniter4-crud/-->
<div class="container">
    <?php foreach ($newses as $news) : ?>
        <div class="row">
            <div class="col-md-12 mb-2 card">
                <div class="card-body">
                    <h5 class="h5"><a href="<?= base_url() ?>/berita/<?= $news['slug'] ?>"><?= $news['title'] ?></a></h5>
                    <p><?= substr($news['content'], 0, 120) ?></p>
                </div>
            </div>
            
        </div>

    <?php endforeach ?>
</div>

<?= $this->endSection() ?>