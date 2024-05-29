<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>
<div class="content-wrapper">
  <?= $this->renderSection('content'); ?>
</div>
<?= $this->include('layout/footer') ?>