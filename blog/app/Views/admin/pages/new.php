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
                <li class="breadcrumb-item"><a href="<?= url_to('admin.pages') ?>">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </nav>
        <h2 class="h4">Add New Page</h2>
        <!-- <p class="mb-0">Your web analytics dashboard template.</p> -->
        <?= $this->include('layout/alert') ?>
    </div>
</div>
<div class="card card-body border-0 shadow mb-4">
    <form method="post" action="<?= url_to('admin.pages.save') ?>">
        <?= csrf_field() ?>
        <?= make_field('title') ?>
        <div class="row">
            <div class="col-md-8">
                <?= make_field('slug') ?>
            </div>
            <div class="col-md-4">
                <?= make_field('date', [], 'date') ?>
            </div>
        </div>
        <?= make_field('body', [], 'textarea') ?>
        <?= make_field('active', ['data' => true], 'switch') ?>
        <?= make_field('fullpage', [], 'switch') ?>
        <?= make_field('comment_active', [], 'switch') ?>

        <div class="mt-3">
            <button class="btn btn-danger mt-2 mr-2 animate-up-2" type="reset" id="reset">Reset</button>
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
        // images_upload_url: ,
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
        plugins: ['image', 'table', 'anchor', 'emoticons','advlist', 'autolink', 'lists', 'link', 'insertdatetime', 'media', 'preview', 'fullscreen', 'code', 'help'],
        // image_advtab: true,
        image_uploadtab: true,
        image_title: true,
        extended_valid_elements: 'script[src|async|defer|type|charset]',
        allow_script_urls: true,
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


    window.onload = () => {
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('keydown', () => {
            slug.value = title.value.replace(/\ /g, '-').trim();
        })
    }
</script>
<?= $this->endSection(); ?>