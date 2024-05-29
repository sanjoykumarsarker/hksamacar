<?= $this->extend('layout/master') ?>

<?= $this->section('content'); ?>
<div class="container-md p-md-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Profile</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card shadow text-center d-block border" style="background: linear-gradient(to right, #eff3ff, #faf9ff);">
                                <img width="96" height="96" src="<?= assets_url('uploads/profile/' . $user->image ?? 'avatar.gif') ?>" alt="Profile Picture of <?= $user->name ?>" class="img-rounded img-responsive mt-3" <?= image_placeholder() ?>>
                                <div class="">
                                    <a href="<?= url_to('profile.edit') ?>" title="Edit Profile" class="btn btn-outline-info btn-sm my-2">Edit →</a>
                                    <h4><?= $user->name ?></h4>
                                    <table class="table table-striped table-hover table-sm">
                                        <tr>
                                            <td class="border-right">Email</td>
                                            <td class="text-left"><?= $user->email ?></td>
                                        </tr>
                                        <tr>
                                            <td class="border-right">Role</td>
                                            <td class="text-left"><?= $user->role ?></td>
                                        </tr>
                                        <tr>
                                            <td class="border-right">Joined</td>
                                            <td class="text-left"><?= $user->created_at ?></td>
                                        </tr>
                                    </table>
                                    <?php if (service('Auth')->isAdmin()) : ?>
                                        <a href="<?= url_to('dashboard') ?>" class="btn btn-lg btn-info mb-2">Goto Dashboard</a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-9">
                            <?php if (empty($posts)) : ?>
                                <h3 class="text-info mt-4">You don't have any post yet.</h3>
                            <?php else : ?>
                                <h1>Your Posts</h1>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= $post->url ?>" title="<?= $post->slug ?>">
                                                        <img loading="lazy" decoding="async" src="<?= $post->media_small_url ?>" alt="banner" class="img-fluid" width="120" height="120" />
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h3 class="mt-0"><?= $post->title ?></h3>
                                                            <p><?= character_limiter(strip_tags($post->body), 150) ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>