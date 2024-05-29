<?php
    $servername="localhost";
    $username="sanpro_hksamacar";
    // $password="";
 
 
    // create connection    
    $conn=mysqli_connect($servername,$username,"01915876543");
    mysqli_select_db($conn,"sanpro_diksa");
    mysqli_query($conn,$sql);

    $sql = "ALTER TABLE `user_image` CHANGE `username` `username` VARCHAR(20) NOT NULL";
    mysqli_query($conn,$sql);

    $sql = "ALTER TABLE `user_image` CHANGE `userimage` `userimage` VARCHAR(40) NOT NULL";
    mysqli_query($conn,$sql);

    $sql = "ALTER TABLE `user_image` CHANGE `userid` `userid` INT(11) NOT NULL AUTO_INCREMENT";
    mysqli_query($conn,$sql);

    echo "<br>done";  
echo '<br>';
  echo $file_name = $_FILES['image']['name'];echo '<br>';
  echo   $file_tmp = $_FILES['image']['tmp_name'];echo '<br>';
   echo  $image=$_FILES["file"]["name"];

    $image_size=getimagesize($_FILES['image']['tmp_name']);
    //echo $image_size;
    if($image_size==FALSE)
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('fill data');</SCRIPT>");
        //readfile("login.php");`enter code here`
    }
    else
    {
        move_uploaded_file($file_tmp,"upload/"."120".$file_name);
        //upload in mysql database

        $file = $_FILES['image']['name'];
     echo   $image_name = addslashes($_FILES['image']['name']);
        $x=$_POST["username"];

        $sql="INSERT INTO  `test`.`user_image` (username, userimage) VALUES('$x','$image_name')";

        if(!$insert=mysqli_query($conn,$sql))
            echo "problem uploading image";
        
            $img="upload/".$file_name;
            echo '<img src= "'.$img.'" height=200 width=150>';
         
    }
?>	
 
