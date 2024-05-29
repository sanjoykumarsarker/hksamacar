<?php foreach ($posts as $index => $post) : ?>
    <div class="<?= $index === array_key_last($posts) ? '' : 'mb-3' ?> border-bottom shadow-sm p-3" style="background: aliceblue;">
        <div class="row no-gutters">
            <div class="col-sm-8">
                <a href="<?= $post->url ?>" title="<?= $post->slug ?>">
                    <h5 class="font-weight-600 mb-1">
                        <?= character_limiter($post->title, 30) ?>
                    </h5>
                </a>
                <p class="fs-13 text-muted mb-0">
                    <span class="mr-2"><?= $post->category_name ?> </span>🕑 <?= $post->created_at->humanize() ?>
                </p>
            </div>
            <div class="col-sm-4 rotate-img">
                <a href="<?= $post->url ?>" title="<?= $post->slug ?>">
                    <img loading="lazy" decoding="async" src="<?= $post->media_small_url ?>" alt="banner" class="img-fluid w-100" />
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>