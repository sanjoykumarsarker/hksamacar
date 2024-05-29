<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        h3:hover {
            background-color: yellow;
            color: red;
            font-size: 30px;
            font-weight: bold;
            underline: none;
        }
    </style>

    <title>
        Delete
    </title>
</head>

<body>
    <br><br><br><br><br>
    <div style="text-align:center" ;>
        <?php



        $reg = $_POST['reg'];


        $devotee_name = $_POST['devotee_name'];

        $servername = "localhost";
        $username = "sanpro_hksamacar";
        $password = "01915876543";
        $dbname = "sanpro_diksa";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sqlu = "DELETE from reg   WHERE reg= '$reg'";

        // $resultu = $conn->query($sqlu);

        $conn->close();

        ?>

        <script>
            alert("<?php echo $devotee_name . '/' . $reg . 'has been Deleted'  ?> ");
        </script>

</body>

</html>