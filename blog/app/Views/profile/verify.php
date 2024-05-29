<?= $this->extend('layout/master') ?>

<?= $this->section('head'); ?>
<title>Verify your Email - Hare Krishna Samacar</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container-md p-md-0">
    <div class="card text-center">
        <div class="card-body">
            <h1><?= $msg ?></h1>
            <div><a class="btn btn-success my-3 btn-lg" href="<?= base_url() ?>">Go to Home</a></div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>