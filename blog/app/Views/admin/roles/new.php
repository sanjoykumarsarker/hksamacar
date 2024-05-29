<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>

<?= $this->include('layout/alert') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
    <div class="d-block mb-2 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item"><a href="<?= url_to('admin.roles') ?>">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </nav>

    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card card-body border-0 shadow mb-4">
            <h4>Add New Role</h4>
            <form method="post" action="<?= url_to('admin.roles.save') ?>">
                <?= csrf_field() ?>
                <?= make_field('name') ?>
                <?= make_field('description') ?>
                <?= make_field('active', ['data' => true], 'switch') ?>
                <div class="mt-3">
                    <button class="btn btn-danger mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button>
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit" id="submit">Save all</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>