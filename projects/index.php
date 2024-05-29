<?php include_once "../session_check.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hare Krishna Samacar</title>
    <link rel="shortcut icon" href="/favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div id="wrapper" class="col-md-2 col-xl-2">
                <?php include_once "../hks_sidebar.php";   ?>

                <?php

                $DB = make_connection();

                if (isset($_POST['new_project'])) {
                    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
                    $date = date('Y-m-d');
                    $create_project_query = "INSERT INTO `projects`(name, description, updated_at) VALUES ('$name', '$description', '$date')";
                    $DB->query($create_project_query);
                    echo "<script>window.location = 'https://www.harekrishnasamacar.com/projects/order.php?id={$DB->insert_id}';</script>";
                    exit("<a class='btn btn-lg btn-primary' href='https://www.harekrishnasamacar.com/projects/order.php?id={$DB->insert_id}'>GO TO NEW</a>");
                    // https://www.harekrishnasamacar.com/projects/order.php?id=22
                }

                function count_total($id)
                {
                    global $DB;
                    $total_query = $DB->query("SELECT COUNT(*) as total, SUM(amount) as amount, SUM(items) as items FROM `orders` WHERE project_id = $id")->fetch_assoc();
                    return $total_query;
                }
                ?>
                <div class="col-md-10 col-xl-10">
                    <!-- Page content -->
                    <div id="page-content-wrapper">

                        <!-- Keep all page content within the page-content inset div! -->
                        <div class="page-content inset p-2">
                            <div class="container mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-4">
                                        <div class="card shadow">
                                            <div class="card-header bg-info text-light">
                                                <h4 class="ml-2">Payment Received</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="payment.php" method="post">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text pr-4">Date</span>
                                                        </div>
                                                        <input class="form-control" type="date" name="date" value="<?= date('Y-m-d') ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text pr-3">Received</span>
                                                        </div>
                                                        <input type="text" autofocus placeholder="Barcode: I100P11" class="form-control" name="received">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text pr-3">Returned</span>
                                                        </div>
                                                        <input type="text" placeholder="Barcode: I100P11" class="form-control" name="returned">
                                                    </div>
                                                    <button class="btn btn-success btn-sm d-none">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="text-white">Today</h4>
                                                    <div>
                                                       <form action="" method="get">
                                                           <input style="width: 33px;border-radius: 10px;" type="date" name="date" id="changeDate" />
                                                       </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive" style="max-height: 200px;overflow-y:auto;scrollbar-width:thin;">
                                                    <table class="table table-sm table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Date</th>
                                                                <th>Project</th>
                                                                <th>Received</th>
                                                                <th>Returned</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $date = $_GET['date'] ?? date('Y-m-d');
                                                            $today_info = $DB->query("SELECT orders.updated_at as date, projects.id as project_id, projects.name, SUM(orders.status='received' OR 0) as received, SUM(orders.status='returned' OR 0) as returned FROM `orders` RIGHT JOIN projects ON projects.id=orders.project_id WHERE orders.updated_at = '$date' GROUP BY projects.id ORDER BY orders.updated_at DESC");
                                                            $info_index = 0;
                                                            while ($info = $today_info->fetch_assoc()) {
                                                                $info_index++;
                                                                ?>
                                                                <tr>
                                                                    <td><?= $info_index  ?></td>
                                                                    <td><?= $info['date'] ?></td>
                                                                    <td><?= $info['project_id'] . '.' . $info['name'] ?></td>
                                                                    <td><?= $info['received'] ?></td>
                                                                    <td><?= $info['returned'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card shadow">
                                            <div class="card-header bg-danger text-light">
                                                <h4 class="ml-2">Add New Event</h4>
                                            </div>
                                            <div class="card-body">

                                                <div class="event-form" style="display:none">
                                                    <form action="" method="post" class="w-100">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control" placeholder="Name of Project" autofocus required>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="description" rows="2" class="form-control" placeholder="Description about Project"></textarea>
                                                        </div>
                                                        <input type="hidden" name="new_project" value="save">


                                                        <div class="btn-group w-100" role="group" aria-label="Basic example">
                                                            <button type="reset" id="hide_form" class="btn w-100 btn-outline-dark">Cancel</button>
                                                            <button type="submit" class="btn btn-dark w-100" name="new_project">Save</button>
                                                        </div>


                                                    </form>
                                                </div>
                                                <div class="m-4 text-center btn-cont py-3">
                                                    <button id="create_event" class="btn btn-danger badge-pill shadow-sm">
                                                        <i class="fa fa-plus fa-3x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    // $DB = make_connection();
                                    $limit = 5;
                                    $current_page = $_GET['page'] ?? 1;
                                    $offset = is_numeric($current_page) && $current_page !== 0 ? ($current_page - 1) * $limit : 0;
                                    $pages_count = $DB->query("SELECT COUNT(id) as total FROM projects")->fetch_assoc();

                                    $pages = (int) ceil($pages_count['total'] / $limit);

                                    // $projects_query = $DB->query("SELECT projects.* FROM `projects` ORDER BY projects.id DESC LIMIT 20");
                                    $projects_query = $DB->query("SELECT projects.id as project_id, projects.name, count(orders.id) as customer, SUM(orders.amount) as total_amount, SUM(orders.status='received' OR 0) as received, SUM(CASE WHEN orders.status='received' THEN orders.amount ELSE 0 END) as total_received, SUM(orders.status='returned' OR 0) as returned, SUM(CASE WHEN orders.status='returned' THEN orders.amount ELSE 0 END) as total_returned, SUM(orders.items) as items FROM `orders` RIGHT JOIN projects ON projects.id=orders.project_id GROUP BY projects.id ORDER BY projects.id DESC LIMIT $limit OFFSET $offset");

                                    while ($result = $projects_query->fetch_assoc()) {
                                        $id = $result['project_id'];
                                        $customer = $result['customer'] ?? 0;
                                        $amount = number_format($result['total_amount']) ?? 0;
                                        $items = number_format($result['items']) ?? 0;
                                        $pending = $customer - ($result['returned'] + $result['received']);
                                        $total_pending = $result['total_amount'] - ($result['total_returned'] + $result['total_received']);
                                        echo "<div class='col-md-4 mb-4'>
                                            <div class='card '>
                                                <div class='card-header bg-success'>
                                                    <h4 class='ml-2'><a href='order.php?id=$id' class='text-light'>$id. {$result['name']}</a></h4>
                                                </div>
                                                <div class='card-body bg-white'>
                                                <table class='table table-bordered table-striped table-sm'>
                                                    <tr>
                                                        <th colspan='3' scope='row'>Customer</th>
                                                        <td colspan='3' >$customer</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='3' scope='row'>Orders</th>
                                                        <td colspan='3' >{$items}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='3' scope='row'>Income</th>
                                                        <td colspan='3'>৳{$amount}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan='2' scope='row'>Returned</th>
                                                        <th colspan='2' scope='row'>Received</th>
                                                        <th colspan='2' scope='row'>Pending</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{$result['returned']}</td>
                                                        <td>৳{$result['total_returned']}</td>
                                                        <td>{$result['received']}</td>
                                                        <td>৳{$result['total_received']}</td>
                                                        <td>{$pending}</td>
                                                        <td>৳{$total_pending}</td>
                                                    </tr>

                                            </table>
                                                </div>
                                            </div>
                                        </div>";
                                    }

                                    ?>

                                </div>

                            </div>
                            <?php
                            $url = parse_url($_SERVER['REQUEST_URI']);
                            parse_str($url['query'], $query);
                            ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item <?= $current_page > 1 &&  $current_page <= $pages ? '' : 'disabled' ?>">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <?php for ($i = 1; $i <= $pages; $i++) {
                                        $params = ['page' => $i];
                                        foreach ($params as $k => $v) $query[$k] = $v;
                                        $new_url = $url['path'] . '?' . http_build_query($query);
                                        ?>
                                        <li class="page-item <?= $i == $current_page ? 'disabled' : '' ?>">
                                            <a class="page-link" href='<?= "https://{$_SERVER['HTTP_HOST']}{$new_url}" ?>'><?= $i ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item <?= $current_page >= 1 &&  $current_page < $pages ? '' : 'disabled' ?>">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $(function() {
                $('#create_event').click(function() {
                    $('.btn-cont').toggleClass('d-none');
                    $('.event-form').show();
                    $('input[name="name"]').focus();
                });

                $('#hide_form').click(function() {
                    $('.event-form').hide();
                    $('.btn-cont').toggleClass('d-none');
                });

                $('#changeDate').change(function(){
                    this.form.submit();
                })
            })


        </script>


</body>

</html>