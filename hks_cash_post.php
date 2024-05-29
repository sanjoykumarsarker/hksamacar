<?php if (!isset($_SESSION)) session_start(); ?>
<?php
include_once "function.php";
include_once "./classes/banglaNumberToWord.php";

// $tran_date = '2022-03-13';
// var_dump($tran_date); // 2022-03-15 current date


function getRetAndDrCN()
{
  $converter = new BanglaNumberToWord();
  $tran_date = date("Y-m-d");
  $connection = make_connection();
  $ret_sql = "SELECT COUNT(Rdate) AS ret FROM tblIssue WHERE Rdate='$tran_date' AND Returned='TRUE'";
  $result_ret = $connection->query($ret_sql);

  $row_ret = $result_ret->fetch_assoc();
  // var_dump($row_ret);
  $GLOBALS['ret'] = $row_ret["ret"] ?? 0;

  $sql_id_cn_dr = "SELECT SUM(Dr) AS dr, COUNT(Dr) AS cn FROM tblIssue WHERE Rdate='$tran_date' AND Returned <>'TRUE'";
  $result = $connection->query($sql_id_cn_dr);

  $row = $result->fetch_assoc();
  $GLOBALS['dr'] = $row["dr"] ? $converter->engToBn(number_format($row["dr"])) : 0;
  $GLOBALS['cn'] = $row["cn"] ?? 0;
  $connection->close();
}
// var_dump($row);
if (isset($_POST['retdrcn'])) {
  getRetAndDrCN();
  echo json_encode(['dr' => $GLOBALS['dr'], 'cn' => $GLOBALS['cn'], 'ret' => $GLOBALS['ret']], JSON_UNESCAPED_UNICODE);
  exit();
}

getRetAndDrCN();


?>
<!DOCTYPE html>
<html>

<head>

  <title>Post Office & Courier</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon1.ico" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


  <style type="text/css">
    body,
    html,
    .container-fluid {
      height: 100%;
    }

    #wrapper {
      background-color: #787878;
    }

    .card-header {
      background-color: #3c3c3c;
      max-height: 40px;
      padding: 5px;
    }

    .card-link {
      color: white;
    }

    .card-link:Hover {
      color: yellow;
    }

    .card-body {
      padding: 5px;
      background-color: #f0f0f0;

    }

    .card-body a {
      color: black;
    }

    .toggle.ios,
    .toggle-on.ios,
    .toggle-off.ios {
      border-radius: 20rem;
    }

    .toggle.ios .toggle-handle {
      border-radius: 20rem;
    }
  </style>
</head>
<script>
  $(document).ready(function() {
    $("cash_receive_barcode_iframe.php  #barcode_btn").click(function() {

      alert("");
    });
  });
</script>

<body>

  <div class="container-fluid">

    <div class="row" style="height: 100%;">

      <div id="wrapper" class="col-md-2 col-xl-2">

        <?php include_once "hks_sidebar.php";   ?>

        <div class="col-md-10 col-xl-10">
          <!-- Page content -->
          <div id="page-content-wrapper">

            <div class="page-content inset">
              <div class="row">
                <div class="col-md-12">
                  <p class="well lead" style="margin-top: 5px;"> Post/Courier ID & Cash receipt Entry </p>
                  <div class="col-sm-12 col-md-12  contact-form">
                    <div class="row">
                      <div class="col-sm-12 contact-form">
                        <!-- div da direita -->
                        <form id="contact" target="cash_receive_iframe" action="hks_cash_receive_iframe_data.php" method="post" class="form" role="form">

                          <div class="row" style="background-color: cornsilk; padding: 10px 0px 0px 0px">
                            <div class="col-xs-6 col-md-6 form-group">
                              <input class="form-control" type="text" name="cash_issue" placeholder="Type Issue No." required>
                            </div>


                            <div class="col-xs-6 col-md-6 form-group" style="text-align: right; padding: 0px 0px 0px 0px">
                              <button class="btn btn-primary " type="submit" name="type" value="Due">Due</button>
                              <button class="btn btn-success" type="submit" name="type" value="Paid">Paid</button>
                              <button class="btn btn-warning" type="submit" name="type" value="Return">Return</button>
                              <button class="btn btn-danger" type="submit" name="type" value="All">All</button>
                              <button class="btn btn-danger" type="submit" name="type" value="Summary">Summary</button>
                              <button class="btn btn-danger" type="submit" name="type" value="Edit">Edit</button>
                            </div>
                            <hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
                        </form>
                        <iframe name="cash_receive_iframe" height="330" width=100% style="background-color: cornsilk; border:0;" style="overflow-y:scroll; overflow-x:scroll;"></iframe>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <hr>
                  <div class="d-flex justify-content-between">
                    <h4>
                      Today Received:
                      <span id="cn" style="color:green ">
                        <?php echo $GLOBALS['cn']; ?></span>
                      (<span id="dr" style="color:blue;"><?php echo $GLOBALS['dr']; ?></span><span style="font-family:SutonnyMJ;">৳</span>),
                      Returned: <span style="color:red;" id="ret">
                        <?php echo $GLOBALS['ret']; ?>
                      </span>
                    </h4>
                    <div>Automatic Submit <input id="auto_mode" autocomplete="off" type="checkbox" form="cash_receive" name="auto_mode" data-toggle="toggle" data-size="xs" data-style="ios" <?php echo isset($_SESSION['auto_mode']) ? 'checked' : '' ?>></div>
                  </div>
                </div>
                <hr style="border-top: 0.5px dotted blue; margin-top: 0.35em;  margin-bottom: 0.35em;">
                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <form id="cash_receive" target="cash_receive_barcode_iframe" action="cash_receive_barcode_iframe.php" method="post" class="form" role="form">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Received</span>
                        </div>
                        <input type="hidden" name="auto_submit" value="0" />
                        <input class="form-control" name="ag_barcode" placeholder="Scan Barcode to record Cash" type="text" required autofocus />
                      </div>
                    </form>
                  </div>

                  <div class="col-xs-6 col-md-6">
                    <form target="return_entry_iframe" action="return_entry_iframe.php" method="post" class="form" role="form" onsubmit="submitReturnForm(event)">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon2">Return</span>
                        </div>
                        <input type="hidden" name="auto_mode" value="0" />
                        <input class="form-control" name="ag_return" placeholder="Scan Barcode to record Return" type="text" autofocus required />
                      </div>
                    </form>
                  </div>
                </div>
                <hr style="border-top: 0.5px dotted blue; margin-top: 0.35em;  margin-bottom: 0.35em;">
                <div class="table-responsive">
                  <iframe name="cash_receive_barcode_iframe" height="185" width=100% style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>
                  <hr style="border-top: 0.2px dotted red; margin-top: 0.1em;  margin-bottom: 0.1em;">
                  <iframe name="return_entry_iframe" height="185" width=100% style="border:0;" style="padding: 0px 0px 0px 0px;" style="overflow-y:scroll; overflow-x:scroll;"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end of row -->
  </div> <!-- end of container -->
  <script>
    const getDrCnRet = async () => {
      let res = await fetch(window.location.href, {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: "retdrcn=1"
      });
      let data = await res.json();
      const types = ['ret', 'dr', 'cn'];
      if (data instanceof Object) {
        for (type of types) {
          if (data.hasOwnProperty(type)) {
            document.querySelector(`#${type}`).innerHTML = data[type];
          }
        }
      }
    }

    var eventMethod = window.addEventListener ?
      "addEventListener" :
      "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod === "attachEvent" ?
      "onmessage" :
      "message";

    eventer(messageEvent, function(e) {
      // if (e.origin !== 'http://the-trusted-iframe-origin.com') return;
      if (e.data === "clearInput" || e.message === "clearInput") {
        document.querySelector('input[name="ag_barcode"]').value = null;
        document.querySelector('input[name="ag_return"]').value = null;
        getDrCnRet();
      }
    });

    let return_input = document.querySelector('input[name="ag_return"]');
    // return_input.addEventListener('keyup', function(e) {
    //   if (event.keyCode == '13') {
    //     e.preventDefault();
    //     console.log(this);
    //   }
    // })
    function submitReturnForm(e) {
      e.preventDefault();
      e.target.querySelector('input[name="auto_mode"]').value = document.querySelector('#auto_mode').checked ? 1 : 0;
      e.currentTarget.submit();
      console.log(e.target.querySelector('input[name="auto_mode"]').value);
    }
  </script>
</body>

</html>