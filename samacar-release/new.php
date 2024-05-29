<?php
session_start();
require_once './_helper.php';
Helper::checkLoginStatus();
$password_hash = null;

if (isset($_POST['password'])) {
    if (password_verify($_POST['password'], Helper::PASSWORD_HASH)) {
        $_SESSION['login'] = time();
    } else {
        $password_hash =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
}
if (isset($_POST['addversion'])) {
    $response_info = Helper::upload($_FILES['archive'], $_POST['version'], trim($_POST['note']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hare Krishna Samacar</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 m-auto">
                <section class="form-simple mt-5">
                    <div class="card">
                        <?php if (!isset($_SESSION['login'])) { ?>
                            <div class="header pt-3 grey lighten-2">
                                <div class="row d-flex justify-content-start">
                                    <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">
                                        Log in
                                    </h3>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card-body mx-4 mt-2">
                            <?php echo $password_hash; ?>

                            <?php if (isset($_SESSION['login'])) {
                                $data = json_decode(file_get_contents(JSON_FILENAME), true);
                                if (isset($release_info)) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        ' . $response_info . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>';
                                }

                                echo '<div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Current Version ' . $data['version'] . '</h4>
                                        <small class="border-top">' . substr($data['description'], 0, 120) . '...</small>
                                     </div>';
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="md-form">
                                        <div class="custom-file">
                                            <input accept=".zip" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="archive">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="md-form">
                                        <input type="text" name="version" id="Form-pass4" class="form-control" required>
                                        <label for="Form-pass4">Version Number</label>
                                    </div>

                                    <div class="md-form">
                                        <textarea type="text" name="note" id="contactForm-mess" class="form-control md-textarea"></textarea>
                                        <label for="contactForm-mess">Release Note...</label>
                                    </div>

                                    <div class="text-center mb-4">
                                        <input type="hidden" name="addversion" value="<?php echo password_hash('csrf_token', PASSWORD_DEFAULT); ?>">
                                        <button class="btn btn-success btn-block z-depth-2 waves-effect waves-light" type="submit">Save</button>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <form action="" method="post">
                                    <div class="md-form pb-3">
                                        <input type="password" name="password" id="Form-pass4" class="form-control" required>
                                        <label for="Form-pass4">Your password</label>
                                    </div>
                                    <div class="text-center mb-4">
                                        <button class="btn btn-danger btn-block z-depth-2 waves-effect waves-light" type="submit">Log in</button>
                                    </div>
                                </form>
                            <?php } ?>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>

</html>