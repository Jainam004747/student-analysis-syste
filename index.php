<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Teacher Login Form</title>
</head>
<body>
   <form class="box" action="" method="post">
       <h1>Login</h1>
       <input type="text" name="email" placeholder="Email">
       <input type="password" name="password" placeholder="password">
       <input type="submit" name="insert" value="Login">
   </form>
    
</body>
</html>
<?php
include "include/connect.php";
session_start();
if(isset($_REQUEST['insert']))
{
     $email=$_REQUEST['email'];
     $password=md5($_REQUEST['password']);
        
            if(!empty($email) && !empty($password))
            {
               $q="select * from teacher_details where email='$email' && password='$password' ";
                if($s=mysqli_query($con,$q))
                {
                    if($r=mysqli_fetch_assoc($s))
                    {
                        $_SESSION['t_login']=$r;
                        header("location:teacherdetails.php");
                    }
                    else
                    {
                        echo "<center><h2>plss Enter Correct user name or password</h2></center>";
                    }
                }
                else{
                    echo mysqli_error($con);
                }
             
            }
            else{
                echo "<center><h2>enter all fields</h2></center>";   
            }
}
?>