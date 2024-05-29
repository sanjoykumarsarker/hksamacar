<?php foreach ($posts as $index => $post) : ?>
    <div class="<?= $index === array_key_last($posts) ? '' : 'mb-4' ?> shadow-sm" style="background:aliceblue;padding:0.7rem;">
        <a href="<?= $post->url ?>" title="<?= $post->slug ?>">
            <h3 class="font-weight-600 text-body">
                <?= character_limiter($post->title, 30) ?>
            </h3>
            <p class="fs-13 text-muted mb-0">
                <span class="mr-2"><?= $post->category_name ?> </span>🕑 <?= $post->created_at->humanize() ?>
            </p>
            <div class="mt-2 w-100 rotate-img">
                <img loading="lazy" decoding="async" loading="lazy" decoding="async" src="<?= $post->media_thumb_url ?>" alt="banner" class="img-fluid w-100 aspect-5-3" />
            </div>
        </a>
    </div>
<?php endforeach; ?>