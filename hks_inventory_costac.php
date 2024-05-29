<!DOCTYPE html>
<html>
<head>



  <meta charset="utf-8">
 
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
 <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
 
</head>

<style>

    .page {
        width: 11.69in;
        min-height: 8.27in;
        padding: 10px 10px 20px 10px;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
	
	
table,th, tr, td {
    border: 0.5px solid black;
    border-collapse: collapse;
}
tr, th, td {
    padding: 0px 0px 0px 0px;
    text-align: Center;
}
tr:nth-child(even) {background-color: #f2f2f2;}

 @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

table td input {
 width: 100%;   height: 100%;
}
</style>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<body >

<div class="page">
<div style="text-align:center;">

<table style="width:100%" >
<tr><th  rowspan="2">Issue</th><th rowspan="2">Received QTY</th><th  rowspan="2">Date</th><th  rowspan="2">Cost PU</th><th  rowspan="2">Price PU</th><th colspan="3" >Disbursement</th><th  rowspan="2">Stock</th><th colspan="2" >Total Cost</th><th colspan="2" >Sales</th><th  rowspan="2">Balance</th><th  rowspan="2"  >Action</th></tr>
<tr>
        <th>Sale</th>
        <th>Speci</th>
        <th>Others</th>
        <th>Direct</th>
		<th>Indirect</th>
		<th>Cash</th>
		<th>Due</th>
    </tr>
<tr><td>0909</td><td>30000</td><td>03/12/2018</td><td>4.15</td><td>4.3</td>
<td>25000</td><td>2000</td><td>1000</td>
<td>2000</td><td>120,000</td><td>20,000</td>
<td>150000</td><td>2500</td><td>10,000</td>
<td><button type="button" class="btn btn-primary btn-xs">EDIT</button></td></tr>
	
</table>
<br><br><br><br>


<form class="needs-validation" novalidate>

<h3 style="text-align: center;">Issue 0909 </h3> <br><br><br>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Received QTY</label>
      <input type="text" class="form-control" id="validationCustom01" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Received Date</label>
      <input type="text" class="form-control" id="validationCustom02" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Others (Wastage/Lost</label>
      <input type="text" class="form-control" id="validationCustom03" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
  </div>
	


<table style="width:100%" >
<tr><td colspan="6">Direct Cost</td></tr>
<tr><th></th><th>Details</th><th>QTY</th><th>Voucher No</th><th>Date</th><th>Total</th></tr>
<tr><td>Paper</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Printing</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Binding</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Layout</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Transport</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Others</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td colspan="5">Total </td></tr>
<tr><td colspan="6">Indirect Cost</td></tr>
<tr><td>Postage</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Transport</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td>Others</td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td><td><input type="text" /></td></tr>
<tr><td colspan="5">Total</td></tr>

</table>
<br>
<div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Are you sure to submit the form?
      </label>
      <div class="invalid-feedback">You must agree before submitting.</div>
    </div>
  </div>
  
  
<button type="button" class="btn btn-success btn-xs" type="submit"> Update</button></div>
</div> <!-- end of container -->
</form>
</body>
</html>