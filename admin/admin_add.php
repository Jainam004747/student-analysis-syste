<?php 
include "header.php";
echo "<div class='container'>";    
echo "<div class='jumbotron'>";
    echo "<div class='card'>";
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Admin_Add</title>

        </head>
        <body>
            <div class="card-header">
            <h2>ADD ADMIN</h2>
            </div>
            <div class="card-body">
                    <form action="" method="post" class="" >
                            <div class="form-group row">   
                                    <label for="uname" class="col-md-2 col-form-label">uname</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter admin user name">
                                    </div>
                            </div>
                            <div class="form-group row">   
                                    <label for="password" class="col-md-2 col-form-label">password</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" id="password" name="pass" placeholder="Enter admin password">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                   <input class="btn btn-dark" type="submit" value="insert" name="submit">
                             </div>           
                    </form>
            </div>
         </body>
        </html>
<?php   
    if(isset($_REQUEST['submit'])){
        $uname=$_REQUEST['uname'];
        $pass=md5($_REQUEST['pass']);
        
        
            if(!empty($uname) && !empty($pass))
            {
                $q="insert into admin_login (uname,password) values ('$uname','$pass')";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>inserted Successfuly.</center></h1>";
                //header("location:branch.php");
                echo "<script>window.location.href = 'adminuser.php';</script>";
                }else
                {
                    echo mysqli_error($con);
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