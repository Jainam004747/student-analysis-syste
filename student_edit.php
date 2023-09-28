<?php 
include "header.php";
echo "<div class='container'>";   
echo "<div class='jumbotron'>";
    echo "<div class='card'>"; 
 $id=$_REQUEST['student_id'];
 $q="select * from student_details where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $f_name=$r['f_name'];
     $m_name=$r['m_name'];
     $l_name=$r['l_name'];
     $gender=$r['gender'];
     $mobile_no=$r['mobile_no'];
     $address=$r['address'];
     $email=$r['email'];
     $bid=$r['branch_id'];
     $sid=$r['sem_id'];
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
    <title>Student_edit</title>
    
    </head>
    <body>
    <div class="card-header">
            <h2>ADD STUDENT</h2>
        </div>
    <div class="card-body">    
        <form action="" method="post" >
        <div class="form-group row">   
                    <label for="fname" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-10">        
                        <input class="form-control" id="fname" type="text" name="f_name" value="<?php echo $f_name?>" required>
                    </div>
        </div>
        <div class="form-group row">   
                    <label for="mname" class="col-md-2 col-form-label">Middle Name</label>
                    <div class="col-md-10">  
                        <input class="form-control" id="mname" type="text" name="m_name" value="<?php echo $m_name?>" required>
                    </div>
        </div>            
        <div class="form-group row">   
                    <label for="lname" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-10">                          
                    <input class="form-control" id="lname" type="text" name="l_name" value="<?php echo $l_name?>" required>
                    </div>
        </div>
        <div class="form-group row">   
                    <label for="gender" class="col-md-2 col-form-label">Gender</label>
                    <div class="ml-4" id="gender">
                        <div class="form-check col-md-5">
                            <input class="form-check-input" id="M" type="radio" value="M" name="gender" <?php if($gender=="M"){echo "checked";}?> >
                            <label class="form-check-label" for="M">Male</label>
                        </div>
                        <div class="form-check col-md-5">
                            <input class="form-check-input" id="F" type="radio" value="F" name="gender" <?php if($gender=="F"){echo "checked";}?> >
                            <label class="form-check-label" for="F">Female</label>
                        </div>
                    </div>
        </div>
        <div class="form-group row">   
                    <label for="mno" class="col-md-2 col-form-label">Mobile No</label>
                    <div class="col-md-10">  
                    <input class="form-control" id="mno" type="number" name="mobile_no" placeholder="Enter Mobile Number" value="<?php echo $mobile_no?>" required>
                    </div>
        </div>
        <div class="form-group row">   
                    <label for="add" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-10"> 
                    <textarea class="form-control" id="add" name="address" cols="22" rows="3" required><?php echo $address?></textarea>
                    </div>
        </div>         
        <div class="form-group row">   
                    <label for="email" class="col-md-2 col-form-label">E-Mail</label>
                    <div class="col-md-10"> 
                    <input class="form-control" id="email" type="email" name="email" value="<?php echo $email?>" placeholder="Enter Email Address" required>
                    </div>
        </div>     
        <div class="form-group row">
                    <label  for="sem" class="col-md-2 col-form-label">Sem</label>
                    <div class="col-md-10">
                    <select class="form-control custom-select my-1 mr-sm-2" name="sem_id" id="sem">
                       <?php
                            $selected=0;
                            $q3="select * from sem";
                            // live sem field in ddl
                            if($s2=mysqli_query($con,$q3))
                            {
                                while($r2=mysqli_fetch_assoc($s2))
                                {
                                    if($sid==$r2['id']){ $selected="selected"; }
                                    else{$selected="0";}
                                    echo "<option $selected value='".$r2['id']."'>".$r2['sem_name']."</option>"; 
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
                       $selected=0;
                        $q2="select * from branch";
                        // live branch field in ddl
                        if($s=mysqli_query($con,$q2))
                        {
                            while($r=mysqli_fetch_assoc($s))
                            {
                                if($bid==$r['id']) { $selected="selected";}
                                else{$selected="0";}
                                echo "<option $selected value='".$r['id']."'>".$r['b_name']."</option>"; 
                            }
                        }
                        else{ echo mysqli_error($con);}

                        ?>
                    </select>
                    </div>
        </div>            
        <div class="form-group">  
                <input class="btn btn-dark" type="submit" value="update" name="submit">
        </div>                
    </form>
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
                $q3="update student_details set f_name='$f_name',m_name='$m_name',l_name='$l_name',gender='$gender',mobile_no='$mobile_no',address='$address',email='$email',sem_id='$sem_id',branch_id='$branch_id' where id='$id'";
                if(mysqli_query($con,$q3))
                {
                echo "<h1><center>Update Successfuly.</center></h1>";
                // header("location:branch.php");
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