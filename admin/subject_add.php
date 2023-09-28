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
            <h2>SUBJECT ADD</h2>
        </div>
        <div class="card-body">
            <form action="" method="post" >
                    <div class="form-group row">   
                                    <label for="sname" class="col-md-2 col-form-label">Branch Name</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="sub_name" id="sname" placeholder="Enter Subject name"></td>
                                    </div>
                    </div>
                    <div class="form-group row">
                            <label for="branch" class="col-md-2 col-form-label">Branch</label>
                            <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="branch_id" id="branch">
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
                    <div class="form-group row">
                            <label for="sem" class="col-md-2 col-form-label">Sem</label>
                            <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="sem_id" id="sem">
                               <?php
                                $q2="select * from sem";
                                if($s2=mysqli_query($con,$q2))
                                {
                                    while($r2=mysqli_fetch_assoc($s2))
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
                            <label for="tname" class="col-md-2 col-form-label">Teacher Name</label>
                            <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="teacher_id" id="tname">
                               <?php
                                $q3="select * from teacher_details";
                                if($s3=mysqli_query($con,$q3))
                                {
                                    while($r3=mysqli_fetch_assoc($s3))
                                    {
                                        echo "<option value='".$r3['id']."'>".$r3['teacher_name']."</option>"; 
                                    }
                                }
                                else{ echo mysqli_error($con);}
                            
                                ?>
                            </select>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="status" id="status">
                                <option value="Y">Active</option>
                                <option value="N">Deactive</option>
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
        $sub_name=$_REQUEST['sub_name'];
        $branch_id=$_REQUEST['branch_id'];
        $sem_id=$_REQUEST['sem_id'];
        $teacher_id=$_REQUEST['teacher_id'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($sub_name) && !empty($branch_id) && !empty($sem_id) && !empty($teacher_id) && !empty($status))
            {
                $q="insert into subject (sub_name,branch_id,sem_id,teacher_id,status) values ('$sub_name','$branch_id','$sem_id','$teacher_id','$status')";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>inserted Successfuly.</center></h1>";
                //header("location:subject.php");
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