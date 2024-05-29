<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../session_check.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hare Krishna Samacar</title>
    <link rel="shortcut icon" href="/favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .result_list li {
            padding: 5px 0 5px 10px;
            margin-bottom: 3px;
        }

        .no-outline:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        .result_list li:hover {
            cursor: pointer;
            background: rgba(255, 255, 225, 0.7);
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<?php

function redirectToFront()
{
    header('Location: https://www.harekrishnasamacar.com/projects', true, 301);
    die();
}

function create_form_select($name, $option, $classes = '')
{
    echo "<div class='form-group'>
    <select class='form-control $classes' name='$name' id='$name'>";
    foreach ($option as $value) {
        echo "<option value='$value'>" . ucfirst($value) . "</option>";
    }
    echo "</select></div>";
}

$DB = make_connection();



if (isset($_POST['new_order']) && $_POST['method'] === 'post') {
    $project_id = $_POST['project_id'];
    $status = trim($_POST['status']);
    $customer_name = trim($_POST['customer_name']);
    $customer_mobile = trim($_POST['customer_mobile']);
    $customer_address = trim($_POST['customer_address']);
    $items = trim($_POST['items']);
    $price = trim($_POST['price']);
    $amount = $_POST['amount'] ?? intval($price) * intval($items);
    $details = trim($_POST['details']);
    $payment_type = trim($_POST['payment_type']);
    $send_mode = trim($_POST['send_mode']);

    $create_order_query = "INSERT INTO `orders`
    (project_id, items, status, customer_name, customer_mobile, customer_address, amount, details, payment_type, send_mode, price)
    VALUES (
        '$project_id', '$items', '$status',
        '$customer_name', '$customer_mobile',
        '$customer_address', '$amount', '$details',
        '$payment_type', '$send_mode', '$price'
    )";

    if ($DB->query($create_order_query)) {
        $_SESSION['message'] = "Successfully Added";
    } else {
        $_SESSION['message'] = $DB->error;
    }
} elseif (!isset($_GET['id']) || is_null($_GET['id']) || empty($_GET['id'])) {

    redirectToFront();
}

$ID = $_GET['id'];
$project = $DB->query("SELECT name FROM `projects` WHERE id=$ID")->fetch_assoc();
if ($project === NULL) {
    echo "<div class='container card text-center bg-warning mt-5 text-danger py-4'><h1>This is wrong ID</h1>";
    echo '<h2 id="timer">10</h2></div>';
    echo "<script>
        var sec = 10;
        setInterval(function() {
            if(sec>0){
                document.getElementById('timer').innerHTML = sec;
                sec--;
            }
          if (sec == 00) {
            window.location = 'https://www.harekrishnasamacar.com/projects';
          }
        }, 1000);
    </script>";
    exit();
}
?>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div id="wrapper" class="col-md-2 col-xl-2">
                <?php include_once "../hks_sidebar.php";   ?>

                <div class="col-md-10 col-xl-10">
                    <!-- Page content -->
                    <div id="page-content-wrapper">

                        <!-- Keep all page content within the page-content inset div! -->
                        <div class="page-content inset p-2">
                            <div class="container-fluid mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <a href="/projects" class="btn btn-sm btn-warning">Back to Project</a>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group m-3">
                                                    <div class="input-group">
                                                        <input type="search" class="form-control" placeholder="Search Customer...." name="q" id="customer_search">
                                                        <input type="submit" id="search" class="btn btn-danger" value="Search">
                                                    </div>
                                                </div>
                                                <ul class="result_list list-group" style="max-height:280px; overflow-y: scroll;"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="text-white"><?= $ID . '. ' . $project['name'] ?> </h4>
                                            </div>
                                            <div class="card-body p-2">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <form id="payment_submit" method="post">
                                                            <input type="hidden" name="project_id" value="<?= $_GET['id']; ?>" />
                                                            <input type="text" name="pay" id="payment" class="form-control" placeholder="Payment..." />
                                                        </form>
                                                    </div>
                                                    <div class="border boder-2 border-secondary p-2">
                                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                            <div class="dropdown">
                                                                <!-- <button type="button" class="btn btn-outline-secondary disabled no-outline"><i class="fa fa-print"></i></button> -->
                                                                <button class="btn btn-info btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">POST</button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="print.php?pid=<?= $_GET['id'] ?>&type=post&print=label" target="_blank">VP Label</a>
                                                                    <a class="dropdown-item" href="print.php?pid=<?= $_GET['id'] ?>&type=post&print=form" target="_blank">VP Form</a>
                                                                </div>
                                                            </div>
                                                            <!-- <a href="print.php?pid=<?= $_GET['id'] ?>&type=post" target="_blank" class="btn btn-info text-white" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">POST</a> -->
                                                            <a href="print.php?pid=<?= $_GET['id'] ?>&type=courier" target="_blank" class="btn btn-primary text-white">COURIER</a>
                                                            <a href="print.php?pid=<?= $_GET['id'] ?>&type=custom" target="_blank" class="btn btn-success text-white">CUSTOM</a>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                                        Add New Order
                                                    </button>
                                                </div>

                                                <div class="table-responsive mt-3">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Mobile</th>
                                                                <th>Address</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Amount</th>
                                                                <th>Send_mode</th>
                                                                <th>Payment_type</th>
                                                                <th>Status</th>
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            if (isset($_GET['id'])) {
                                                                $id = $_GET['id'];
                                                                $get_orders = "SELECT * FROM `orders` WHERE project_id= $id ORDER BY id DESC";
                                                                $orders = $DB->query($get_orders);
                                                                // if ($orders->num_rows <= 0){

                                                                //     header('Location: https://www.harekrishnasamacar.com/projects');
                                                                //     die('hello');
                                                                // }
                                                                while ($order = $orders->fetch_assoc()) {
                                                                    echo "<tr>" .
                                                                        "<td>" . $order['id'] . "</td>"  .
                                                                        "<td>" . $order['customer_name'] . "</td>"  .
                                                                        "<td>" . $order['customer_mobile'] . "</td>" .
                                                                        "<td>" . $order['customer_address'] . "</td>" .
                                                                        "<td>" . $order['items'] . "</td>" .
                                                                        "<td>" . $order['price'] . "</td>" .
                                                                        "<td>" . $order['amount'] . "</td>" .
                                                                        "<td>" . $order['send_mode'] . "</td>" .
                                                                        "<td>" . $order['payment_type'] . "</td>" .
                                                                        "<td>" . $order['status'] . "</td>" .
                                                                        "<td>" . $order['details'] . "</td>" .
                                                                        "<td></td>
                                                                        </tr>";
                                                                }
                                                            } else {
                                                                echo "<tr class='text-center p-4'>
                                                                        <td colspan='7'>
                                                                            <h1>Not Found...</h1>
                                                                            <a href='https://harekrishnasamacar.com/projects' class='btn btn-success'>Back</a>
                                                                        </td>
                                                                    </tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" x-data="{
                        items:'',
                        price:'',
                        amount:''
                    }">
                        <form action="" method="post" class="order-form">
                            <input type="hidden" name="method" value="post" />
                            <input type="hidden" name="oid" value="" />
                            <input type="hidden" name="project_id" value="<?= $_GET['id']; ?>" />
                            <div class="row">
                                <div class="col-md-4">
                                    <?php create_form_select('status', ['ordered', 'delivered', 'received', 'pending', 'returned']) ?>
                                </div>
                                <div class="col-md-4">
                                    <?php create_form_select('send_mode', ['post', 'courier', 'custom']) ?>
                                </div>
                                <div class="col-md-4">
                                    <?php create_form_select('payment_type', ['cash', 'bkash', 'bank']) ?>
                                </div>
                            </div>

                            <div class="form-group form-row" @upamount="amount=Math.floor(items*price)||''">
                                <div class="col-md-3">
                                    <input @change="$dispatch('upamount')" type="number" class="form-control" x-model="items" name="items" placeholder="Quantity" />
                                </div>
                                <div class="col-md-1 text-center align-items-center" style="display:inline-grid">
                                    X
                                </div>
                                <div class="col-md-3">
                                    <input @change="$dispatch('upamount')" type="number" class="form-control" x-model="price" name="price" placeholder="Price" />
                                </div>
                                <div class="col-md-5">
                                    <input type="number" class="form-control" x-model="amount" name="amount" placeholder="Amount of Payment" />
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="customer_name" placeholder="Customer Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="customer_mobile" placeholder="Mobile Number" />
                            </div>
                            <div class="form-group">
                                <!-- <div class="col-md-7"> -->
                                <textarea class="form-control" name="customer_address" placeholder="Address..." rows="2"></textarea>
                                <!-- </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control mb-3" name="courier" placeholder="Courier" />
                                    <input type="text" class="form-control form-control-sm" name="courier" placeholder="Courier Address" />
                                </div> -->
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="details" placeholder="Description...." rows="1"></textarea>
                            </div>
                            <input type="hidden" name="new_order" value="1">
                            <!-- detalis, status  -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="order-form-reset">Close</button>
                        <button type="button" class="btn btn-primary" id="order-form-submit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script> -->
        <script defer src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script defer src=" https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script defer src=" https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script defer src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $('.result_list').hide();
            $(function() {
                function customer_search() {
                    if ($('#customer_search').val().length > 0) {
                        var jqxhr = $.get(`search.php?q=${$('#customer_search').val()}`)
                            .done(function(data) {
                                if (data.length > 0) {
                                    $('.result_list').show();
                                }
                                let html = '';
                                data.forEach(el => {
                                    html += `<li class='list-group-item' data-mob='${el.mobile}' data-address='${el.address}'>${el.name}</li>`;
                                });
                                $('.result_list').html(html);
                            })
                            .fail(function() {
                                $('.result_list').hide();
                                alert("error");
                            });
                    }
                }

                $('#search').click(customer_search);
                $('#customer_search').on('keypress', function(e) {
                    if (e.keyCode == 13) {
                        customer_search();
                    }
                });

                $('#order-form-reset').click(() => $('.order-form').trigger('reset'));

                $('.result_list').click(function(e) {
                    let modal = $('#exampleModal');
                    let node = $(e.target);
                    modal.modal();
                    modal.find('input[name=customer_name]').val(node.text());
                    modal.find('input[name=customer_mobile]').val(node.attr('data-mob'));
                    modal.find('textarea[name=customer_address]').val(node.attr('data-address'));
                    // modal.find('input[name=customer_mobile]').attr('type', 'hidden');
                });


                $('#order-form-submit').click(() => $('.order-form').trigger('submit'));
                const status_keys = {
                    received: 'badge-success',
                    returned: 'badge-danger',
                    pending: 'badge-info',
                    delivered: 'badge-warning',
                };

                $('.table').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['excel', 'print'],
                    order: [
                        [0, "desc"]
                    ],
                    columnDefs: [{
                        targets: -1,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex">
                                        <button class="badge mr-1 b-edit btn-sm btn-success" id="e-${meta.row}" ><i class="fa fa-edit"></i></button>
                                        <button class="badge mr-1 b-remove btn-sm btn-danger" id="d-${row[0]}"><i class="fa fa-trash"></i></button>
                                        <a target="_new" href="${window.location.origin}/projects/print.php?pid=<?php echo $_GET['id']; ?>&id=${row[0]}&type=${row[7]}"
                                          id="e-${meta.row}" ><button class="badge text-white b-print btn-sm btn-info"><i class="fa fa-print"></i></button></a>
                                    </div>`;
                        }
                    }, {
                        targets: [5, 8, 10],
                        visible: false,
                        searchable: false
                    }, {
                        targets: 9,
                        render: function(data, type, row, meta) {
                            let className = status_keys[data] || 'badge-secondary';
                            return `<div class="badge ${className} badge-pill text-uppercase">${data}</div>`;
                        }
                    }]
                });

                // $('#exampleModal').on('shown.bs.modal', function(event) {
                //     let modal = $(this);

                //     let items = modal.find('input[name=items]');
                //     let price = modal.find('input[name=price]');

                //     $(items, price).on('change', function() {
                //         let itemsValue = items.val();
                //         let priceValue = price.val();
                //         let amount = modal.find('input[name=amount]');
                //         if (itemsValue && priceValue && !amount.val()) {
                //             amount.val(Math.floor(parseInt(itemsValue) * parseInt(priceValue)));
                //         }
                //     })
                // })



                // Edit Modal
                $('table tbody').on('click', '.b-edit', function() {
                    var id = $(this).attr("id").match(/\d+/)[0];
                    var data = $('table').DataTable().row(id).data();
                    // console.log(data);
                    let modal = $('#exampleModal');
                    modal.modal();
                    modal.find('form').attr('action', `${window.location.origin}/projects/action.php`);
                    // modal.find('input[name=new_order]').val(0);
                    modal.find('input[name=oid]').val(data[0]);
                    modal.find('input[name=method]').val("PUT");
                    modal.find('input[name=customer_name]').val(data[1]);
                    modal.find('input[name=customer_mobile]').val(data[2]);
                    modal.find('textarea[name=customer_address]').val(data[3]);
                    modal.find('input[name=items]').val(data[4]);
                    modal.find('input[name=price]').val(data[5]);
                    modal.find('input[name=amount]').val(data[6]);
                    modal.find(`select[name=send_mode] option[value='${data[7]}']`).attr('selected', 'selected');
                    modal.find(`select[name=payment_type] option[value='${data[8]}']`).attr('selected', 'selected');
                    modal.find(`select[name=status] option[value='${data[9]}']`).attr('selected', 'selected');
                    modal.find('textarea[name=details]').val(data[10]);
                });

                // Delete button
                $('table tbody').on('click', '.b-remove', function() {
                    var id = $(this).attr("id").match(/\d+/)[0];
                    // var data = $('table').DataTable().row(id).data();

                    $.confirm({
                        title: 'Are you sure!!',
                        content: 'You want to delete this record.',
                        backgroundDismiss: true,
                        buttons: {
                            yes: function() {
                                $.post(`${window.location.origin}/projects/action.php`, {
                                    id: id,
                                    method: 'delete'
                                }, (data, status) => {
                                    $.dialog({
                                        title: status.toUpperCase(),
                                        content: data.msg,
                                        type: status === 'success' ? 'green' : 'red'
                                    });
                                    setTimeout(() => window.location.reload(), 3000);
                                });
                            },
                            cancel: function() {},
                        }
                    });
                });


                <?php if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']); ?>

                    $.dialog({
                        title: "Message",
                        content: "<?= $message ?>",
                        type: 'green'
                    });

                <?php } ?>

            });

            $('#payment_submit').submit((e) => {
                e.preventDefault();
                $.confirm({
                    title: 'Record Received/Returned',
                    content: `
                    <form action="payment.php" method="post">
                        <input type="hidden" name="payment" value="${$(e.target).find('input[name="pay"]').val()}" />
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Date</span>
                            </div>
                            <input class="form-control" type="date" name="date" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Status</span>
                            </div>
                            <select name="received" class="form-control">
                                <?php foreach (['received', 'returned', 'pending'] as $status) { ?>
                                    <option value="<?= $status ?>"><?= ucfirst($status) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>`,
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function() {
                                this.$content.find('form').submit();
                            }
                        },
                        cancel: function() {
                            //close
                        },
                    },
                    onContentReady: function() {
                        document.onkeydown = (evt) => {
                            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                            if (keyCode == 13) {
                                this.$content.find('form').submit();
                            }
                        }
                    }
                });
            });
        </script>
</body>

</html>