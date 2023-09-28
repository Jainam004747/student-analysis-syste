<?php 
    $host="localhost";
    $user="root";
    $password="";
    $db="sas";
    
    $con=mysqli_connect($host,$user,$password);
    if($con){
        if(mysqli_select_db($con,$db)){ }
        else
        {
            mysqli_error($con); 
        }
    }
    else{
        echo "<br> can't connect";
    }
?>