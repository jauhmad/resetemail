<!-- buatan sendiri https://www.petanikode.com/codeigniter4-view/ -->
<!-- https://www.petanikode.com/codeigniter4-view-layout/ -->

<?= $this->extend('tataletak/tataletak_halaman') ?>

<?= $this->section('konten') ?>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($data_faqs as $faq) : ?>
                    <h2 class="h2"><?= $faq['question'] ?></h2>
                    <p><?= $faq['answer'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

    