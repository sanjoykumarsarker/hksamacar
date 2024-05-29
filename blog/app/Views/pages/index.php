<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-0">
    <?= $this->include('layout/alert') ?>
    <div class="row">
        <div class="col-sm-12 overflow-hidden p-0 <?= $page->fullpage === '1' ? 'col-md-12' : 'col-md-9' ?>">
            <div class="card">
                <div class="card-body">
                    <div class="aboutus-wrappe">
                        <h1 class="mt-1">
                            <?= $page->title ?>
                        </h1>
                        <hr>
                        <div class="post-body">
                            <?= $page->body ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($page->fullpage !== '1') : ?>
            <div class="col-sm-12 col-md-3">
                <div class="bg-white">
                    <div class="p-3">
                        <h2 class="mb-3 border-danger border-bottom border-3 text-primary font-weight-600">
                            Latest News
                        </h2>
                        <?php foreach (service('latestPostCategories')->latestPosts(3) as $index => $latestPost) : ?>

                            <div class="news-thumb border-bottom pb-4 pt-2">
                                <div class="d-flex justify-content-between">
                                    <div class="w-50 pr-2">
                                        <img loading="lazy" decoding="async"  src="<?= $latestPost->media_thumb_url ?>" alt="banner" class="img-fluid" />
                                    </div>
                                    <div class="w-100">
                                        <a href="<?= $latestPost->url ?>">
                                            <h5 class="font-weight-600 mb-1">
                                                <?= character_limiter($latestPost->title, 30) ?>
                                            </h5>
                                        </a>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">News </span>🕑 <?= $latestPost->created_at->humanize() ?>
                                        </p>
                                    </div>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection('content'); ?>