<?php  include_once "session_check.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hare Krishna Samacar</title>
    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
        integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>


<body>
    <div class="container-fluid">        
        <div class="row" style= "height: 100vh;" >
            <div id="wrapper" class="col-md-2 col-xl-2">
            <?php include_once "hks_sidebar.php" ;   ?>
        
        <!-- SECOND ROW OF BLOCKS -->
        <div class="col-md-10 col-xl-10"> 
            <!-- Page content -->
            <div id="page-content-wrapper">	
                <div class="page-content inset p-2">                    
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-sm-12 col-lg-12">
                            <p class="bg-info bg-inline-block text-center text-white"
                                style="font-size: 40px; font-family:French Script MT;">
                                User Dashboard</p>
                        </div>
                    </div>
                    <?php
                        $a=$_SESSION['id'];                                                
                        // Create connection
                        $connr = make_connection();                        
                        
                        // Update User
                        if ($_POST['user_update']) {                           
                            $u_name = $_POST['u_name'];
                            $user_name = $_POST['username'];
                            $u_address = $_POST['u_address'];
                            $u_email = $_POST['u_email'];
                            $u_mobile = $_POST['u_mobile'];
                            $password = $_POST['password'];
                            $access_level = $_POST['access_level'];

                            // Update Query
                            $sql = "UPDATE users SET 
                            `u_name` = '$u_name',
                            `user_name` = '$user_name',
                            `u_address` = '$u_address',
                            `u_email` = '$u_email',
                            `u_mobile` = '$u_mobile',
                            `password` = '$password',
                            `access_level` = '$access_level'
                            WHERE id='$a'";

                            if ($connr->query($sql) === TRUE) {
                                echo notification("Record updated successfully", "success");
                            } else {                                    
                                echo notification("Error updating: " . $connr->error, "danger");
                            }                            
                        }


                        // Find User Details
                        $sqlr = "SELECT * FROM users where id= '$a'";
                        
                        $resultr = $connr->query($sqlr);

                        if ($resultr->num_rows > 0) {
                                
                            // output data of each row
                            while($row = $resultr->fetch_assoc())
                            
                            {

    echo "
		<form action='' method='POST' class='mx-4 bg-light border shadow'>
	        <table class='table table-bordered'>     	
		        <tr>		
                    <td>
                        <div class='form-group' >
                            <label class='control-label col-sm-3' for='u_name'>Name: </label>
                            <div class='col-sm-9'>			
                                <input class='form-control'  type='text' name='u_name'  value='".$row["u_name"]."'>
                            </div>                            
                        </div>                        
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='u_address'>Address: </label>
                            <div class='col-sm-9'>
                                <input class='form-control' type='text' name='u_address' value='".$row["u_address"]."'>
                            </div>                          
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='u_email'>Email : </label>
                            <div class='col-sm-9'>
                                <input class='form-control' type='text' name='u_email' value='".$row["u_email"]."'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='u_mobile'>Mobile : </label>
                            <div class='col-sm-9'>
                                <input class='form-control' type='text' name='u_mobile' value='".$row["u_mobile"]."'>
                            </div>
                        </div>		
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='username'>Username : </label>
                            <div class='col-sm-9'>
                                <input class='form-control' type='text' name='username' value='".$row["user_name"]."'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='password'>Password : </label>
                            <div class='col-sm-9'>
                                <input class='form-control' type='text' name='password' value='".$row["password"]."'>
                            </div>
                        </div>
                    </td>
                    <td>	
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='id'>User ID: </label>
                            <div class='col-sm-9'>
                                <input id='u_id' class='form-control' type='text' name='u_id' readonly='readonly'
                                    value='".$row["id"]."'>
                            </div>
                        </div>
                        <div class='form-group' >
                            <label class='control-label col-sm-3' for='rgd_date'>Regd. Date: </label>
                            <div class='col-sm-9'>
                                <input class='form-control'  type='text' name='rgd_date' disabled value='".$row["rgd_date"]."'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='control-label col-sm-3' for='assign'>Assignment : </label>
                            <div class='col-sm-9'>
                                <select name='access_level' class='custom-select bg-dark text-warning'>
                                    <option>Select Access...</option>";
                                    foreach (['1632'=>'Super Admin', '108'=>'Admin', '32'=>'General'] as $key => $value) {
                                        $selected = $key == $row["access_level"] ? 'selected' : '';
                                        echo "<option value='$key' $selected >$value</option>";
                                    }
                              echo "</select>
                                
                            </div>
                        </div>
                    </td>        
                </tr> ";
    }
      echo "</table>
            <div class='text-center mx-5 mb-3'>     
            <input type='hidden' name='user_update' value='true' />       
                <button type='submit' class='btn btn-success' >
                    <i class='fa fa-pencil-square-o'></i> Update
                </button>
            </div>
        </form>";
}   else {
}
$connr->close();
?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>