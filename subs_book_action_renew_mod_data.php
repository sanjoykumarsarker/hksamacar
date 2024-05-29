<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

  <title>Subscriber Book</title>


  <meta charset="utf-8">

  <link rel="shortcut icon" href="favicon1.ico" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>




</head>

<body>

  <?php $id = $_POST["ag_id_en"];
  $ag_name = $_POST['ag_name']; ?>
  <?php $status = $_POST["status"]; ?>
  <?php $quantity = $_POST["ag_quantity"]; ?>

  <?php
  $servername = "localhost";
  $username = "HKSamacar_local";
  $password = "Jpsk/1866";
  $dbname = "HareKrishnaSamacar";

  // Create connection

  ?>
  <?php


  // Create connection
  $conn_id = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn_id, "utf8");
  $sql_id = "SELECT ag_quantity,status,skip FROM tblMem where ID_EN =" . $id . "";
  $result_id = $conn_id->query($sql_id);

  if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();
    $GLOBALS['ag_quantity'] = $row["ag_quantity"];
    $GLOBALS['status'] = $row["status"];
    $GLOBALS['skip'] = $row["skip"];
  } else {
    echo "0 results";
  }

  $mobile_query = $conn_id->query("SELECT mob from tblMem WHERE ID_EN='$id'")->fetch_row();
  $message_query = $conn_id->query("SELECT message from sms_template WHERE name='Payment Confirmation' ")->fetch_row();

  $message = $message_query[0];
  $mobile_number = $mobile_query[0];


  $conn_id->close();
  ?>
  <p style="text-align:center; color:blue;"> <?php echo  $id; ?>: &nbsp <?php echo $ag_name; ?></p>
  <hr style="border-top: 0.5px dotted green; margin-top: 0.35em;  margin-bottom: 0.35em;">

  <div class="alert alert-success alert-dismissible d-none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> SMS successfully sent.
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">

      <span class="input-group-text" id="basic-addon1">Quantity</span>


      <form method="post" target="_blank" action="subs_book_action_renew_mod_update_data.php">
        <input type="hidden" name="id" value="<?php echo  $id; ?>">

        <input type="text" class="form-control" name="quantity" aria-label="Quantity" aria-describedby="basic-addon1">
    </div>
    <br>
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Donation</span>


      <input type="text" class="form-control" name="donation" aria-label="Skip for (Month)" aria-describedby="basic-addon1">
    </div>

  </div>


  <div class="radio">
    <label>


      <input type="radio" name="paymode" value="CASH">

      CASH </label>
  </div>
  <div class="radio">
    <label>

      <input type="radio" name="paymode" value="EPAY">



      E-PAY </label>


  </div>
  <button type="submit" class="btn btn-danger btn-sm "> Update</button>

  </form>
  <button id="sms" class="btn btn-primary btn-sm">SMS <i class="fa fa-paper-plane"></i></button>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  <script>
    window.onload = () => {
      $('#sms').click(async () => {
        const id = "<?php echo $id ?>";
        let msg = "<?php echo preg_replace('/\s\s+/', '', $message) ?>";
        msg = msg.replace(':id', id);
        const number = "<?php echo $mobile_number ?>";
        $.LoadingOverlay("show", {
          image: "",
          fontawesome: "fa fa-cog fa-spin"
        });
        try {
          await axios.post(`${window.location.origin}/sms/send.php`, {
            type: 'static',
            to: number,
            text: msg,
          });
          $('.alert').removeClass('d-none');
        } catch (error) {
          alert(error.toString());
          console.log(error);
        }
        $.LoadingOverlay("hide");
      })
    }
  </script>
</body>

</html>