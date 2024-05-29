<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>
<?= $this->include('layout/alert') ?>
<div class="row">
    <div class="col-12 my-4">
        <div class="card card-body">
            <h4><?= uri_string() ?></h4>
            <hr>
            <img src="https://raw.githubusercontent.com/sahapranta/scs/master/public/media/source.gif" alt="work in progress">
            <p> pLorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatum laudantium animi voluptate ullam laboriosam dolores eum vel dolor doloremque placeat a officia necessitatibus, magni ut ad distinctio voluptates ex?
            </p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>