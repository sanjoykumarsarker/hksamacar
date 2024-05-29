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
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card card-body border-0 shadow mb-4 <?= $role['name'] === 'superadmin' ? 'disabled-div' : '' ?>">
            <h4>Edit Role</h4>
            <form method="post" action="<?= url_to('admin.roles.update', $role['id']) ?>">
                <?= csrf_field() ?>
                <?= make_field('name', ['data' => $role['name']]) ?>
                <?= make_field('description', ['data' => $role['description']]) ?>
                <?= make_field('active', ['data' => true], 'switch') ?>
                <div class="mt-3">
                    <!-- <button class="btn btn-danger mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button> -->
                    <button class="btn btn-gray-800 mt-2 animate-up-2" <?= $role['name'] === 'superadmin' ? 'disabled type="button"' : 'type="submit"' ?>>Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="card card-body shadow <?= $role['name'] === 'superadmin' ? 'disabled-div' : '' ?>">
            <h4><span class="text-danger"><?= strtoupper($role['name']) ?></span>: Manage Permissions</h4>
            <hr class="mt-0" />
            <form action="<?= url_to('admin.permission.manage', $role['id']) ?>" method="post">
                <?= csrf_field() ?>
                <div class="row">
                    <?php foreach ($permissions as $group => $values) : ?>
                        <div class="col-md-3 mb-3">
                            <fieldset>
                                <legend>Manage <?= ucfirst($group) ?></legend>
                                <?php foreach ($values as $permission) : ?>
                                    <div class="form-check">
                                        <input name="permissions[<?= $permission['id'] ?>]" class="form-check-input" type="checkbox" value="<?= $permission['name'] ?>" id="<?= $permission['name'] ?>" <?= in_array($permission['name'], $role_permissions) ? 'checked' : '' ?> <?= $role['name'] === 'superadmin' ? 'disabled' : '' ?> />
                                        <label class="form-check-label" for="<?= $permission['name'] ?>"><?= ucwords(str_replace('_', ' ', $permission['name'])) ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </fieldset>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <button <?= $role['name'] === 'superadmin' ? 'disabled type="button"' : 'type="submit"' ?> class="btn btn-info mt-2 animate-up-2" id="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>