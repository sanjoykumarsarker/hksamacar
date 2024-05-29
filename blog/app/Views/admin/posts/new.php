<?= $this->extend('admin/layout/main') ?>

<?= $this->section('head'); ?>
<link href="<?= assets_url('admin/js/filepond/plugins/image-preview.css') ?>" rel="stylesheet" />
<link href="<?= assets_url('admin/js/filepond/dist/filepond.min.css') ?>" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?= $this->include('admin/layout/top_nav') ?>
<div class="flex-wrap py-2 d-flex justify-content-between flex-md-nowrap align-items-center">
    <div class="mb-2 d-block mb-md-0">
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
<div class="mb-4 border-0 shadow card card-body">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Please Follow the Instructions</h4>
        <ul>
            <li><b>Title</b> : Must be precise and 70-100 character long</li>
            <li><b>Slug</b> : Must be unique and Space or Special characters are not allowed</li>
            <li><b>Tags</b> : Comma Seperated and try to avoid space and Special characters</li>
            <li><b>Image</b> :
                <ul>
                    <li>To edit and reduce size use <a target="_blank" href="https://squoosh.app/">Squoosh App</a> </li>
                    <li>Upload image below <kbd>100kb</kbd></li>
                    <li>Image type <kbd>WEBP</kbd> is better <kbd>JPG</kbd>,<kbd>PNG</kbd>,<kbd>GIF</kbd>etc. are also supported</li>
                    <li>Please Rename Image with suitable name before upload</li>
                </ul>
            </li>
        </ul>
        <hr>
        <p class="mb-0">Please format <b>Body</b> correctly, Set suitable Category, Use Video as category only for youtube link.</p>
    </div>
    <h3>Add New Post</h3>
    <form method="post" action="<?= url_to('admin.posts.save') ?>" enctype='multipart/form-data'>
        <?= csrf_field() ?>

        <?= make_field('title') ?>
        <div class="row">
            <div class="col-md-8">
                <?= make_field('slug') ?>
            </div>
            <div class="col-md-4">
                <?= make_field('author') ?>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="mb-3 col-md-6">
                <div class="mb-3 form-group">
                    <label for="tags">Tags</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input name="tags" class="form-control" id="tags" type="text" placeholder="Comma Seperated tags" value="<?= old('tags') ?>">
                    </div>
                    <div class="form-text text-muted ms-2">
                        Meaningfull, related tags without space
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select name="category" class="form-select mb-0 <?= display_error('category', true)  ?>" id="category" aria-label="Select Category">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>" <?= old('category') == $category->id ? 'selected' : '' ?>>
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
                                    <option value="<?= $status ?>"><?= strtoupper($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= display_error('status') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-switch"><input name="active" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="checked"> <label class="form-check-label" for="flexSwitchCheckChecked">Active</label></div>
                    <div class="form-check form-switch"><input name="comment_active" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"> <label class="form-check-label" for="flexSwitchCheckChecked">Comment Active</label></div>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <input type="file" class="filepond <?= display_error('image', true) ?>" name="image" accept="image/png, image/jpeg, image/gif, image/webp" />

                <?= display_error('image') ?>

                <div class="mt-3">
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
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" id="body" placeholder="Post Body..."><?= old('body') ?></textarea>
            </div>
        </div>


        <div class="mt-3">
            <button class="mt-2 mr-2 btn btn-danger animate-up-2" type="reset" id="reset">Reset</button>
            <button class="mt-2 btn btn-gray-800 animate-up-2" type="submit" id="submit">Save all</button>
        </div>
    </form>




    <div class="my-4">
        <h4># Bijoy to Unicode Converter</h4>
        <div align="center">
            <textarea autofocus="autofocus" class="form-control unicode_textarea" id="EDT" name="textarea" placeholder="ইউনিকোডে লেখা পেস্ট করুন" value=""></textarea>
        </div>

        <div class="my-3 convert_button_left">
            <button class="mr-2 btn btn-indigo" name="ConvertToAsciiButton" onFocus="ConvertToTextArea(&#39;CONVERTEDT&#39;)" type="button" value="">
                TO BIJOY
            </button>
            <button class="mr-2 btn btn-warning" name="ConvertButton" onFocus="ConvertFromTextArea(&#39;CONVERTEDT&#39;)" type="button" value="">
                TO UNICODE
            </button>
            <button class="btn btn-danger" onclick="ClearInput();" type="button" value="">RESET
            </button>
        </div>




        <div>
            <input name="CharsTyped" readonly="" size="2" style="font-weight:bold; border: 0px solid #2D69AE; color:#808080; text-align:left;" type="hidden" value="0">
            <input name="WordsTyped" readonly="" size="3" style="font-weight:bold; border: 1px solid #2D69AE; color:#808080; text-align:right;" type="hidden" value="0">
            <input name="CharsLeft" readonly="" size="8" type="hidden" value="100000">
            <input name="WordsLeft" readonly="" size="8" type="hidden" value="100000">
        </div>
        <div>
            <textarea autofocus="autofocus" class="form-control bijoy_textarea" id="CONVERTEDT" placeholder="বিজয়ে লেখা পেস্ট করুন" value=""></textarea>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= assets_url('admin/js/tinymce/tinymce.min.js') ?>" referrerpolicy="origin"></script>

<script src="<?= assets_url('admin/js/filepond/plugins/image-preview.js') ?>"></script>
<script src="<?= assets_url('admin/js/filepond/plugins/file-validate-type.js') ?>"></script>
<script src="<?= assets_url('admin/js/filepond/plugins/image-exif-orientation.js') ?>"></script>
<!-- <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script> -->

<script src="<?= assets_url('admin/js/filepond/dist/filepond.min.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/bijoy.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/unicode.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/base.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/keymap.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/check.js') ?>"></script>
<script src="<?= assets_url('admin/js/bijoy-converter/converter.js') ?>"></script>


<script type='text/javascript'>
    // FilePond.parse(document.body);
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
    );

    // Select the file input and use
    // create() to turn it into a pond
    const pond = FilePond.create(
        document.querySelector('.filepond'), {
            storeAsFile: true,
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 260,
            // stylePanelLayout: 'compact',
            stylePanelLayout: 'integrated',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );


    tinymce.init({
        selector: '#body',
        plugins: ['image', 'table', 'anchor', 'emoticons', 'advlist', 'autolink', 'lists', 'link', 'insertdatetime', 'media', 'preview', 'fullscreen', 'code', 'help'],
        // image_advtab: true,
        image_uploadtab: true,
        image_title: true,
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
        });

        const tags = document.querySelector('#tags');
        tags.addEventListener('keydown', () => {
            tags.value = tags.value.replace(/\ /g, ',');
        });
    }

    function ClearInput() {
        document.getElementById("EDT").value = '';
        document.getElementById("CONVERTEDT").value = '';
        document.getElementById("EDT").focus();
    }

    // $('document').ready(function() {
    //     $('title').keydown(function() {
    //         $('slug').val($(this).val().replace(/\ /g, '-'));
    //     })
    // });
</script>
<?= $this->endSection(); ?>