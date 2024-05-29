<?= $this->extend('admin/layout/main') ?>


<?= $this->section('head'); ?>
<style>
    .code {
        caret-color: white;
        background-color: #201343;
        font-family: monospace;
        line-height: 20pt;
        tab-size: 2;
        color: beige;
    }

    .code:focus {
        caret-color: white;
        background-color: #201343;
        font-family: monospace;
        line-height: 20pt;
        tab-size: 2;
        color: beige;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>
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
                <li class="breadcrumb-item"><a href="<?= url_to('admin.settings') ?>">Settings</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">New</li> -->
            </ol>
        </nav>
        <h2 class="h4">Settings</h2>
        <!-- <p class="mb-0">Your web analytics dashboard template.</p> -->
        <?= $this->include('layout/alert') ?>
    </div>
</div>
<!-- Form -->
<div class="card card-body border-0 shadow mb-4">
    <div class="mb-2">
        <a class="btn btn-danger" href="<?= url_to('admin.clean.cache')?>">Clean Cache</a>
    </div>
    <form method="post" action="<?= url_to('admin.pages.save') ?>">
        <?= csrf_field() ?>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <?php foreach (array_keys($grouped_settings) as $index => $key) : ?>
                    <button class="nav-link <?= !isset($_GET['active']) && !$index ? 'active' : isset($_GET['active']) && strtolower($_GET['active']) === $key ? 'active' : '' ?>  text-capitalize" id="nav-<?= $key ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= $index ?>" type="button" role="tab" aria-controls="nav-contact" aria-selected="<?= !$index ?>"><?= $key ?></button>
                <?php endforeach; ?>
                <!-- <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button> -->
                <!-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <?php foreach (array_values($grouped_settings) as $index => $settings) : ?>
                <div class="tab-pane fade show <?= !$index ? 'active' : '' ?>" id="nav-<?= $index ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="p-4">
                        <form action="<?= url_to('admin.settings.update') ?>" method="post">
                            <?= @csrf_field() ?>
                            <input type="hidden" name="key" value="<?= array_keys($grouped_settings)[$index] ?>" />
                            <div class="row">
                                <?php foreach ($settings as $setting) : ?>
                                    <?php if ($setting['type'] === 'boolean') : ?>
                                        <div class="col-12 mb-3">
                                            <div class='form-check form-switch'>
                                                <input type="hidden" name="<?= $setting['key'] ?>" value="0">
                                                <input name='<?= $setting['key'] ?>' class='form-check-input' type='checkbox' value='<?= $setting['value'] ?>' <?= $setting['value'] === '1' ? 'checked' : 0 ?> />
                                                <label class='form-check-label' for='<?= $setting['key'] ?>'><?= ucwords(str_replace('_', ' ', $setting['key'])) ?></label>
                                            </div>
                                        </div>
                                    <?php elseif ($setting['type'] === 'html') : ?>
                                        <div class="col-6 mb-3">
                                            <label for="<?= $setting['key'] ?>"><?= ucwords(str_replace('_', ' ', $setting['key'])) ?></label>
                                            <textarea id="editing" oninput="update(this.value);" class="form-control code" name="<?= $setting['key'] ?>"><?= htmlentities($setting['value']) ?></textarea>
                                            <pre id="highlighting" aria-hidden="true">
                                            <code class="language-html" id="highlighting-content"></code>
                                        </pre>
                                        </div>
                                    <?php elseif ($setting['type'] === 'textarea') : ?>
                                        <div class="col-6 mb-3">
                                            <label for="<?= $setting['key'] ?>"><?= ucwords(str_replace('_', ' ', $setting['key'])) ?></label>
                                            <textarea class="form-control" name="<?= $setting['key'] ?>" rows="4"><?= htmlentities($setting['value']) ?></textarea>
                                        </div>
                                    <?php else : ?>
                                        <div class="col-6 mb-3">
                                            <label for="<?= $setting['key'] ?>"><?= ucwords(str_replace('_', ' ', $setting['key'])) ?></label>
                                            <input type="text" class="form-control" name="<?= $setting['key'] ?>" value="<?= htmlentities($setting['value']) ?>" />
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-info mt-2 animate-up-2" type="submit" id="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur ab dicta est doloribus dolorum quia! Laudantium dolorum veritatis molestias labore, repudiandae, repellat quasi eligendi eveniet possimus ipsum consectetur et asperiores.</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur ab dicta est doloribus dolorum quia! Laudantium dolorum veritatis molestias labore, repudiandae, repellat quasi eligendi eveniet possimus ipsum consectetur et asperiores.</div> -->
        </div>



        <!-- <div class="mt-3"> -->
        <!-- <button class="btn btn-danger mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button> -->
        <!-- <button class="btn btn-info mt-2 animate-up-2" type="submit" id="submit">Save all</button> -->
        <!-- </div> -->
    </form>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script type='text/javascript'>
    window.onload = () => {
        document.querySelectorAll("input[type='checkbox']").forEach(el => {
            el.addEventListener('change', (e) => {
                e.target.setAttribute('value', e.target.checked ? '1' : '0');
            })
        })
        // $("input[type='checkbox']").on('change', function() {
        //     if ($(this).is(':checked')) {
        //         $(this).attr('value', 'true');
        //     } else {
        //         $(this).attr('value', 'false');
        //     }
        // });
    }
</script>
<?= $this->endSection(); ?>