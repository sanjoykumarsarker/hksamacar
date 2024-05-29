<?= $this->extend('admin/layout/main') ?>

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
                <li class="breadcrumb-item"><a href="<?= url_to('admin.posts') ?>">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </nav>
        <!-- <h2 class="h4">New Post</h2> -->
        <!-- <p class="mb-0">Your web analytics dashboard template.</p> -->
    </div>
</div>

<?= $this->include('layout/alert') ?>
<div class="card card-body border-0 shadow mb-4">
    <h2 class="h3 mb-4">Add New Post</h2>
    <form method="post" action="<?= url_to('admin.posts.update', $post->id) ?>" enctype='multipart/form-data'>
        <?= csrf_field() ?>

        <?= make_field('title', ['data' => $post->title]) ?>
        <div class="row">
            <div class="col-md-8">
                <?= make_field('slug', ['data' => $post->slug]) ?>
            </div>
            <div class="col-md-4">
                <?= make_field('author', ['data' => $post->author]) ?>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <div class="form-group mb-3">
                    <label for="tags">Tags</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input name="tags" class="form-control" id="tags" type="text" placeholder="Comma Seperated tags" value="<?= old('tags', implode(',', $post->tags)) ?>">
                    </div>
                    <div class="form-text text-muted ms-2">
                        Meaningfull, related tags without space
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select name="category" class="form-select mb-0 <?= display_error('category', true)  ?>" id="category" aria-label="Select Category">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>" <?= old('category', $post->category_id) == $category->id ? 'selected' : '' ?>>
                                        <?= $category->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= display_error('category') ?>
                        </div>
                        <div class="col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-select mb-0 <?= display_error('status', true)  ?>" id="status" aria-label="Select Status">
                                <?php foreach (['published', 'saved', 'archived', 'deleted', 'proof'] as $status) : ?>
                                    <option value="<?= $status ?>" <?= old('status', $post->status) === $status ? 'selected' : '' ?>><?= strtoupper($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= display_error('status') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= make_field('active', ['data' => $post->active], 'switch') ?>
                    <?= make_field('comment_active', ['data' => $post->comment_active], 'switch') ?>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <?php if (isset($post->link)) : ?>
                    <div class="">
                        <label for="youtube-url">Youtube URL</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill="currentColor" d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z" />
                                </svg>
                            </span>
                            <input name="youtube-url" class="form-control <?= display_error('youtube-url', true)  ?>" type="text" placeholder="https://www.youtube.com/watch?v=Xvw76aa_B6Q" value="<?= old('youtube-url') ?>">
                            <?= display_error('youtube-url') ?>
                        </div>

                    </div>
                <?php else : ?>
                    <div class="image-preview-container">
                        <div class="preview">
                            <img id="preview-selected-image" src="<?= $post->media_url ?>" />
                        </div>
                        <label for="image">Upload Image</label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/gif, image/webp" />
                    </div>
                    <?= display_error('image') ?>
                <?php endif; ?>
            </div>
        </div>

        <?= make_field('body', ['data' => $post->body], 'textarea') ?>


        <div class="mt-3">
            <button class="btn btn-danger-800 mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button>
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit" id="submit">Save all</button>
        </div>
    </form>

</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= assets_url('admin/js/tinymce/tinymce.min.js') ?>" referrerpolicy="origin"></script>

<script type='text/javascript'>
    tinymce.init({
        selector: '#body',
        // images_upload_url: "<?= url_to('admin.image.upload') ?>",
        images_upload_handler: function(blobInfo, success, failure) {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', "<?= url_to('admin.image.upload') ?>");
            xhr.setRequestHeader('X-CSRF-TOKEN', "<?= csrf_hash() ?>"); // manually set header

            xhr.onload = function() {
                if (xhr.status !== 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                let json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location !== 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            let formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        plugins: ['image', 'table', 'anchor', 'emoticons', 'advlist', 'autolink', 'lists', 'link', 'insertdatetime', 'media', 'preview', 'fullscreen', 'code', 'help'],
        extended_valid_elements: 'script[src|async|defer|type|charset]',
        allow_script_urls: true,
        image_uploadtab: true,
        image_title: true,
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link unlink anchor removeformat",
        // toolbar2: "|  | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        setup: (editor) => {
            editor.ui.registry.addContextToolbar('imagealignment', {
                predicate: (node) => node.nodeName.toLowerCase() === 'img',
                items: 'alignleft aligncenter alignright',
                position: 'node',
                scope: 'node'
            });
        }
    });

    const previewImage = (event) => {
        const imageFiles = event.target.files;
        const imageFilesLength = imageFiles.length;
        if (imageFilesLength > 0) {
            // const imageSrc = URL.createObjectURL(imageFiles[0]);
            const imagePreviewElement = document.querySelector("#preview-selected-image");
            let reader = new FileReader()
            reader.readAsDataURL(imageFiles[0])
            reader.onloadend = () => {
                const imageSrc = reader.result;
                imagePreviewElement.src = imageSrc;
            }
        }
    };



    window.onload = () => {
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');
        // title.addEventListener('keydown', () => {
        //     slug.value = title.value.replace(/\ /g, '-').trim();
        // })
        const tags = document.querySelector('#tags');
        tags.addEventListener('keydown', () => {
            tags.value = tags.value.replace(/\ /g, ',');
        });
        const image = document.querySelector('#image')
        if (image) image.addEventListener('change', previewImage);
    }
</script>
<?= $this->endSection(); ?>
<?= $this->section('head'); ?>

<style>
    .image-preview-container {
        width: 70%;
        margin: 0 auto;
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 0.5rem;
        position: relative;
    }

    .image-preview-container img {
        width: 100%;
        max-height: 200px;
        /* display: none; */
        margin-bottom: 15px;
    }

    .image-preview-container input {
        display: none;
    }

    .image-preview-container label {
        /* height: 40px; */
        text-align: center;
        background: #1f2937;
        color: #fff;
        font-size: 13px;
        text-transform: Uppercase;
        font-weight: 400;
        /* border-radius: 8px; */
        cursor: pointer;
        display: flex;
        /* align-items: center; */
        justify-content: center;
        position: absolute;
        left: 0;
        width: 100%;
        bottom: 0;
        margin: 0;
        padding: 0.4rem;
    }
</style>

<?= $this->endSection(); ?>