<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container">
    <?= $this->include('layout/alert') ?>
    <div class="col-sm-12">
        <div class="card" data-aos="fade-up">
            <div class="card-body">
                <h2 class="font-weight-600 mb-1"><?= strtoupper($type) . ': ' . $category ?></h2>
                <hr>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="border-bottom pb-4 pt-4">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="<?= base_url('news') . '/' . $post['slug'] ?>">
                                                <img src="<?= assets_url('images/inner/inner_7.jpg') ?>" alt="banner" class="thumb-image" />
                                            </a>
                                        </div>
                                        <div class="col-sm-8">
                                            <a style="text-decoration: none;color:initial" href="<?= base_url('news') . '/' . $post['slug'] ?>">
                                                <h3 class="font-weight-600 mb-1">
                                                    <?= $post['title'] ?>
                                                </h3>
                                            </a>
                                            <p class="fs-13 text-muted mb-2">
                                                <span class="mr-2">Photo </span>10 Minutes ago
                                            </p>
                                            <div style="line-height: 1.7;">
                                                <?= character_limiter(strip_tags($post['body']), 350) ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>