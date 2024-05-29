<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <style>
 
 div {
    border:1px solid black;
    width:400px;
    height:110px;
    overflow:scroll;
}

 </style>
<script  >
$(document).ready(function () {
   
 
        $('div').animate({
             scrollTop: $('div')[0].scrollHeight}, 1000
        );
    
});

</script>
</head>
<body>
<div>
    <ul>
        <li>Item</li>
		 <li>Item</li> <li>Item</li> <li>Item</li> <li>Item</li> <li>Item</li> <li>Item</li>
        <li>Item</li>
        <li>Item</li>
    </ul>
</div>
<button id="append">Add Item</button>
</body>
</html>