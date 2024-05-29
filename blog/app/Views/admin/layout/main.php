<?= $this->include('admin/layout/header') ?>
<?= url_is('admin*') ? $this->include('admin/layout/side_nav') : '' ?>

<main class="<?= url_is('admin*') ? 'content' : '' ?>">
    <?= $this->renderSection('content'); ?>
</main>
<?php if (url_is('admin*')) : ?>
    <script defer src="<?= assets_url('admin/js/popper.min.js') ?>"></script>
    <script defer src="<?= assets_url('admin/js/bootstrap.min.js') ?>"></script>
    <!-- <script defer src="<?= assets_url('admin/js/sweetalert2/dist/sweetalert2.min.js') ?>"></script> -->
    <script defer src="<?= assets_url('admin/js/volt.js') ?>"></script>
<?php endif; ?>
<?= $this->include('admin/layout/footer') ?>