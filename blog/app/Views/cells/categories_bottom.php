<?php foreach ($categories as $index => $category) : ?>
    <div class="news-thumb <?= $index === array_key_last($categories) ? 'pt-2' : 'py-2' ?> " >
        <a href="<?= base_url('category') . '/' . $category->name ?>">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-600"><?= $category->name ?></h5>
                <div class="badge badge-danger border-rounded"><?= number_format($category->total_posts) ?></div>
            </div>
        </a>
    </div>
<?php endforeach; ?>