<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-md-0">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->include('layout/alert') ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Profile</h3>
                    <a class="btn btn-outline-danger" title="Back to Profile" href="<?= url_to('profile') ?>">← Back</a>
                </div>
                <div class="card-body">

                    <form method="post" action="<?= url_to('admin.users.update', $user->id) ?>">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6">
                                <?= make_field('name', ['data' => $user->name]) ?>
                            </div>
                            <div class="col-md-6">
                                <?= make_field('email', ['data' => $user->email], 'email') ?>
                            </div>
                            <div class="col-md-6">
                                <?= make_field('password', [], 'password') ?>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-info btn-lg mt-2" type="submit">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>