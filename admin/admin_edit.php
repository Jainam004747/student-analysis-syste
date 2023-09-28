<?php 
include "header.php";
echo "<div class='container'>";    
echo "<div class='jumbotron'>";
    echo "<div class='card'>";
 $id=$_REQUEST['admin_id'];
 $q="select * from admin_login where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $uname=$r['uname'];
     $pass =$r['password']; 
 }
else
{
    echo mysqli_error(con);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin_edit</title>
    
    </head>
    <body>
    
               
    <div class="card-header">
            <h2>Admin_edit</h2>
    </div>
    <div class="card-body">
            <form action="" method="post" class="" >
                            <div class="form-group row">   
                                    <label for="uname" class="col-md-2 col-form-label">uname</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="uname" id="uname" value="<?php echo "$uname"?>" placeholder="Enter admin user name">
                                    </div>
                            </div>
                            <div class="form-group row">   
                                    <label for="op" class="col-md-2 col-form-label">Old Password</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="password" name="op" id="op" placeholder="Enter old pass">
                                    </div>
                            </div>
                            <div class="form-group row">   
                                    <label for="n0p" class="col-md-2 col-form-label">New Password</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="password" name="np" id="np" placeholder="Enter new pass">
                                    </div>
                            </div>
                            <div class="form-group">  
                                <input class="btn btn-dark" type="submit" value="insert" name="submit">
                            </div> 
                            <input type="hidden" name="pass" value="<?php echo "$pass"?>">
            </form>
   </body>
</html>
<?php   
    if(isset($_REQUEST['submit'])){
        $uname=$_REQUEST['uname'];
        $op=md5($_REQUEST['op']);
        $np=md5($_REQUEST['np']);
        $pass=$_REQUEST['pass'];
        
            if(!empty($uname) && !empty($op) && !empty($np))
            {
                if($op == $pass)
                {
                    $q3="update admin_login set uname='$uname',password='$np' where id='$id'";
                    if(mysqli_query($con,$q3))
                    {
                    echo "<h1><center>Update Successfuly.</center></h1>";
                    //header("location:branch.php");
                    echo "<script>window.location.href = 'adminuser.php';</script>";
                    }else
                    {
                        echo mysqli_error($con);
                    }
                }    
            }
            else{
                echo "<h1><center>pls enter all fields</center></h1>";
            }
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
?>