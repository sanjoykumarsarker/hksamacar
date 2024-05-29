<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 
	<?php
		
		
		$reg = $_POST['reg'];
		
		
  $bname = $_POST['bname'];
   $ename = $_POST['ename'];
   
   echo  $ename;
   $age = $_POST['age'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $service = $_POST['service'];
   $gender = $_POST['gender'];
   $education = $_POST['education'];
   $mstatus = $_POST['mstatus'];
   $nprefer = $_POST['nprefer'];
   $id = $_POST['id'];
   ?>
<div class="container">
   
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Preview</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
		
		
	
         <h4>  Name(Bangla): $bname </h4>
		  <h4> Name(English):<?php echo $ename; ?> </h4>
		  
		  
		  <h4> Age:$age   </h4>
		    <h4> Address :$address  </h4>
		  <h4>  Phone:$phone  </h4>
		  <h4> Service: $service  </h4>
		  <h4> Gender :$gender  </h4>
		  <h4> Education:$education   </h4>
		  <h4>Marital Status :$mstatus   </h4>
		  <h4>  Name Preference:$nprefer  </h4>
		 
		 
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>