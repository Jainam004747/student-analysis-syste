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
            <title>Branch_Add</title>

        </head>
        <body>
        <div class="card-header">
            <h2>ADD STUDENTS</h2>
        </div>
        <div class="card-body">
            <form action="" method="post" >
               <div class="form-group row">   
                    <label for="fname" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-10"> 
                    <input class="form-control" id="fname" type="text" name="f_name" placeholder="Enter First Name" required> 
                    </div>
                </div>
               <div class="form-group row">   
                    <label for="mname" class="col-md-2 col-form-label">Middle Name</label>
                    <div class="col-md-10">  
                    <input class="form-control" id="mname" type="text" name="m_name" placeholder="Enter Middle Name" required>
                    </div>
                </div>
                <div class="form-group row">   
                    <label for="lname" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-10">  
                    <input class="form-control" id="lname" type="text" name="l_name" placeholder="Enter Last Name" required> 
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
                    <label for="mno" class="col-md-2 col-form-label">Mobile No</label>
                    <div class="col-md-10">  
                    <input class="form-control" id="mno" type="number" name="mobile_no" placeholder="Enter Mobile Number" required>
                    </div>
                </div>
                <div class="form-group row">   
                    <label for="add" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-10"> 
                    <textarea class="form-control" id="add" name="address" cols="22" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">   
                    <label for="email" class="col-md-2 col-form-label">E-Mail</label>
                    <div class="col-md-10"> 
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email Address" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="sem" class="col-md-2 col-form-label">Sem</label>
                    <div class="col-md-10">
                    <select class="form-control custom-select my-1 mr-sm-2" name="sem_id" id="sem">
                    <?php
                     $q2="select * from sem";
                     if($s=mysqli_query($con,$q2))
                     {
                        while($r2=mysqli_fetch_assoc($s))
                        {
                            echo "<option value='".$r2['id']."'>".$r2['sem_name']."</option>"; 
                        }
                     }
                     else{ echo mysqli_error($con);}
                    
                    ?>
                    </select>
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
        </div>
        </body>
        </html>
<?php   
    if(isset($_REQUEST['submit'])){
        $f_name=$_REQUEST['f_name'];
        $m_name=$_REQUEST['m_name'];
        $l_name=$_REQUEST['l_name'];
        $gender=$_REQUEST['gender'];
        $mobile_no=$_REQUEST['mobile_no'];
        $address=$_REQUEST['address'];
        $email=$_REQUEST['email'];
        $sem_id=$_REQUEST['sem_id'];
        $branch_id=$_REQUEST['branch_id'];
        
        
            if(!empty($f_name) && !empty($m_name) && !empty($l_name) && !empty($gender) && !empty($mobile_no)   && !empty($address) && !empty($email))
            {
                $q="insert into student_details (f_name,m_name,l_name,gender,mobile_no,address,email,sem_id,branch_id) values ('$f_name','$m_name','$l_name','$gender','$mobile_no','$address','$email','$sem_id','$branch_id')";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>inserted Successfuly.</center></h1>";
                //header("location:subject.php");
                echo "<script>window.location.href = 'student.php';</script>";
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