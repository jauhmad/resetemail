<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Email PNS</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
</head>

<body>

    <?= $this->include('tataletak/admin/navbar') ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                 <?php
    if(session()->getFlashData('success')){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
    ?>

    <?php
    if(session()->getFlashData('danger')){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('danger') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
    ?>

    <?php
    if(session()->getFlashData('info')){
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('info') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
    ?>

    
                <?= $this->renderSection('konten') ?>
            </div>
        </div>
    </div>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>