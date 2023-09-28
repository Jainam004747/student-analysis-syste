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
            <title>Teacher_Add</title>

        </head>
        <body>
        <div class="card-header">
            <h2>TEACHER ADD</h2>
        </div>
        <div class="card-body">
            <form action="" method="post" >
                    <div class="form-group row">   
                        <label for="tname" class="col-md-2 col-form-label">Teacher Name</label>
                        <div class="col-md-10">
                        <input class="form-control" type="text" name="teacher_name" id="tname" placeholder="Enter Teacher Name" required>
                        </div>
                    </div>
                   <div class="form-group row">   
                        <label for="email" class="col-md-2 col-form-label">E-Mail</label>
                        <div class="col-md-10">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email Address" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="form-group row">   
                        <label for="pass" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                        <input class="form-control" type="text" name="password" id="pass" placeholder="Enter Teacher Password" required>
                        </div>
                    </div>
                    <div class="form-group row">   
                        <label for="gender" class="col-md-2 col-form-label">Gender</label>
                        <div class="ml-4" id="gender">
                            <div class="form-check col-md-5">
                                <input class="form-check-input" id="M" type="radio" value="M" name="gender" >
                                <label class="form-check-label" for="M">Male</label>
                            </div>
                            <div class="form-check col-md-5">
                                <input class="form-check-input" id="F" type="radio" value="F" name="gender" >
                                <label class="form-check-label" for="F">Female</label>
                            </div>
                        </div>
                    </div>     
                    <div class="form-group row">
                            <label for="bname" class="col-md-2 col-form-label">Branch</label>
                            <div class="col-md-10">
                            <select class="form-control custom-select my-1 mr-sm-2" name="branch_id" id="bname">
                                   <?php
                                    $q="select * from branch";
                                    if($s=mysqli_query($con,$q))
                                    {
                                        while($r=mysqli_fetch_assoc($s))
                                        {
                                            echo "<option value='".$r['id']."'>".$r['b_name']."</option>"; 
                                        }
                                    }
                                    else{ echo mysqli_error($con);}
                                
                                    ?>
                            </select>
                            </div>
                    </div>
                    <div class="form-group"> 
                    <input class="btn btn-dark" type="submit" value="insert" name="submit">
                    </div>
             </form>
         </body>
        </html>
<?php   
    if(isset($_REQUEST['submit'])){
        $teacher_name=$_REQUEST['teacher_name'];
        $email=$_REQUEST['email'];
        $password=md5($_REQUEST['password']);
        $gender=$_REQUEST['gender'];
        $branch_id=$_REQUEST['branch_id'];

            if(!empty($teacher_name) && !empty($email) && !empty($password) && !empty($gender))
            {
                $q="insert into teacher_details (teacher_name,email,password,gender,branch_id) values ('$teacher_name','$email','$password','$gender','$branch_id')";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>inserted Successfuly.</center></h1>";
                //header("location:subject.php");
                echo "<script>window.location.href = 'teacher.php';</script>";
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