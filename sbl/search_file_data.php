
 <!DOCTYPE html>
<html>
<head>

<title>Sanjoy Banking Solution</title>


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
 
  <style>
.accordion {
  background-color: #eec;
  color: #4f4;
  cursor: pointer;
  padding: 15px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
 
  <body>

  <div class="row">
 <?php


  $search_string_all=$_POST["search_string"];
 // pass delimiter and string to explode function
 $search_string = explode('*', $search_string_all);

$count=1;
if ($handle = opendir('.')) {

    while (false !== ($file_name = readdir($handle))) {

        if ($file_name != "." && $file_name != "..") {

          //  echo $file_name."<br>";
         
$search_find_flag=1;
          foreach($search_string as $search_string_single) 
          {
            $preg_match="/".$search_string_single."/i";
            $preg_match_sense="/".$search_string_single."/";

            $file_get_contents=file_get_contents($file_name);
  //line

 
  $file = fopen($file_name,"r");
while(! feof($file))
{
//echo fgets($file). "<br />";
$file_cont=fgets($file);
if(preg_match($preg_match_sense, $file_cont))

  
{
echo "<p style='color:green'> &nbsp &nbsp &nbsp &nbsp &nbsp Result for ".$search_string_single."->(".$file_cont. ")</p>";
 }

}
fclose($file);
           echo "<br>";
            if(preg_match($preg_match, file_get_contents($file_name)))

            
            {
              echo fgets($file). "<br />";

    
               }
     
             else{
                $search_find_flag=0;    

          } 
        }
        if($search_find_flag!=0){
            echo "<button class='accordion  ' style='color:black'> $count )   $file_name</button>";
            
        
            $file = $file_name;
            $orig = file_get_contents($file);
            $a = htmlentities($orig);
            
            echo '<code class="panel">';
            echo '<pre>';
            
            echo $a;
            
            echo '</pre>';
            echo '</code>';
            
            
            echo "<hr>";
            $count++;

          
            //line

        }
                     

        }

        else{
            
        }

       
    }

    closedir($handle);
}

?>
 
 
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
 
</html>