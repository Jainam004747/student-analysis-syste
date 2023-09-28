<?php 
include "header.php";
echo "<div class='container'>";  
echo "<div class='jumbotron'>";
    echo "<div class='card'>";
 $id=$_REQUEST['subject_id'];
 global $con;
 $q="select * from subject where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $sub_name=$r['sub_name'];
     $bid=$r['branch_id'];
     $sid=$r['sem_id'];
     $tid=$r['teacher_id'];
     $status=$r['status'];
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
    <title>Branch_edit</title>
    
</head>
<body>
        <div class="card-header">
            <h2>EDIT SUBJECT</h2>
        </div>
        <div class="card-body">
                <form action="" method="post" >
                <div class="form-group row">   
                        <label for="sname" class="col-md-2 col-form-label">Subject Name</label>
                        <div class="col-md-10">
                        <input class="form-control" type="text" name="sub_name" value="<?php echo "$sub_name"?>" placeholder="Enter branch name" id="sname">
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
                <div class="form-group row">
                            <label for="sem" class="col-md-2 col-form-label">Sem</label>
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
                            <label for="teacher" class="col-md-2 col-form-label">Teacher name</label>
                            <div class="col-md-10">
                            <select class="form-control custom-select my-1 mr-sm-2" name="teacher_id" id="teacher">
                                <?php
                                    $selected=0;
                                    $q4="select * from teacher_details";
                                    // live teacher field in ddl
                                    if($s3=mysqli_query($con,$q4))
                                    {
                                        while($r3=mysqli_fetch_assoc($s3))
                                        {
                                            if($tid==$r3['id']){ $selected="selected"; }
                                            else{$selected="0";}
                                            echo "<option $selected value='".$r3['id']."'>".$r3['teacher_name']."</option>"; 
                                        }
                                    }
                                    else{ echo mysqli_error($con);}
                                
                                ?>
                            </select>
                            </div>
                </div>
                <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label">status</label>
                            <div class="col-md-10">    
                            <select class="form-control custom-select my-1 mr-sm-2" name="status" id="status"> 
                                <option <?php if($status=='Y'){ echo "selected";}?> value='Y'>Active</option>
                                <option <?php if($status=='N'){ echo "selected";}?> value='N'>Deactive</option>
                            
                            </select>
                            </div>
                </div>
                <div class="form-group"> 
                    <input class="btn btn-dark" type="submit" value="UPDATE" name="submit"></td>
                </div>           
               
                </form>
   </body>
</html>
<?php   
    if(isset($_REQUEST['submit'])){
        $sub_name=$_REQUEST['sub_name'];
        $branch_id=$_REQUEST['branch_id'];
        $sem_id=$_REQUEST['sem_id'];
        $teacher_id=$_REQUEST['teacher_id'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($sub_name) && !empty($branch_id) && !empty($sem_id)&& !empty($teacher_id) && !empty($status))
            {
                $q="update subject set sub_name='$sub_name', branch_id='$branch_id' , sem_id='$sem_id', teacher_id='$teacher_id' ,status='$status' where id='$id'";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>Update Successfuly.</center></h1>";
                // header("location:branch.php");
                echo "<script>window.location.href = 'subject.php';</script>";
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