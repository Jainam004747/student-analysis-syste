<?php 
include "header.php";
echo "<div class='container'>";   
echo "<div class='jumbotron'>";
    echo "<div class='card'>";
 $id=$_REQUEST['teacher_id'];
 $q="select * from teacher_details where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $teacher_name=$r['teacher_name'];
     $email=$r['email'];
     $pass=$r['password'];
     $gender=$r['gender'];
     $bid=$r['branch_id'];
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
    <title>teacher_edit</title>
    
    </head>
    <body>
    <div class="card-header">
            <h2>EDIT TEACHER</h2>
    </div>
    <div class="card-body">
    <form action="" method="post" >
                <div class="form-group row">   
                        <label for="tname" class="col-md-2 col-form-label">Teacher Name</label>
                        <div class="col-md-10">
                        <input class="form-control" type="text" id="tname" name="teacher_name" value="<?php echo $teacher_name?>" required>
                        </div>
                </div>        
                <div class="form-group row">   
                        <label for="email" class="col-md-2 col-form-label">E-Mail</label>
                        <div class="col-md-10">
                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $email?>" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
                <div class="form-group row">   
                        <label for="gender" class="col-md-2 col-form-label">Gender</label>
                        <div class="ml-4" id="gender">
                            <div class="form-check col-md-5">
                            <input class="form-check-input" type="radio" id="M" value="M" name="gender" <?php if($gender=="M"){echo "checked";}?> >
                            <label class="form-check-label" for="M">Male</label>
                            </div>
                            <div class="form-check col-md-5">
                            <input class="form-check-input" type="radio" id="F" value="F" name="gender" <?php if($gender=="F"){echo "checked";}?> >
                            <label class="form-check-label" for="F">Female</label>
                            </div>
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
                </table> 
             </form>
    </div>
   </body>
</html>
<?php   
    if(isset($_REQUEST['submit'])){
        $teacher_name=$_REQUEST['teacher_name'];
        $email=$_REQUEST['email'];
        $op=md5($_REQUEST['op']);
        $np=md5($_REQUEST['np']);
        $gender=$_REQUEST['gender'];
        $branch_id=$_REQUEST['branch_id'];
        
        
        if(!empty($teacher_name)  && !empty($gender) && !empty($email))
            {
                if($op == $pass)
                {
                $q3="update teacher_details set teacher_name='$teacher_name',email='$email',password='$np',gender='$gender',branch_id='$branch_id' where id='$id'";
                if(mysqli_query($con,$q3))
                {
                echo "<h1><center>Update Successfuly.</center></h1>";
                // header("location:teacher.php");
                echo "<script>window.location.href = 'teacher.php';</script>";
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
?>