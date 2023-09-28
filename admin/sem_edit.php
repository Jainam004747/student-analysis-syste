<?php 
include "header.php";
echo "<div class='container'>"; 
echo "<div class='jumbotron'>";
    echo "<div class='card'>";   
 $id=$_REQUEST['sem_id'];
 $q="select * from sem where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $sem_name=$r['sem_name'];
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
    <title>SEM_edit</title>
    
    </head>
    <body>
        <div class="card-header">
            <h2>EDIT SEM</h2>
        </div>
        <div class="card-body">
                <form action="" method="post" >
                <div class="form-group row">
                        <label for="sem_name" class="col-md-2 col-form-label">Sem</label>
                        <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="sem_name">
                                <option <?php if($sem_name==1){ echo "selected";}?> value="1">1</option>
                                <option <?php if($sem_name==2){ echo "selected";}?> value="2">2</option>
                                <option <?php if($sem_name==3){ echo "selected";}?> value="3">3</option>
                                <option <?php if($sem_name==4){ echo "selected";}?> value="4">4</option>
                                <option <?php if($sem_name==5){ echo "selected";}?> value="5">5</option>
                                <option <?php if($sem_name==6){ echo "selected";}?> value="6">6</option>
                                <option <?php if($sem_name==7){ echo "selected";}?> value="7">7</option>
                                <option <?php if($sem_name==8){ echo "selected";}?> value="8">8</option>
                            </select>
                        </div>                    
                </div>
                <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <select class="custom-select my-1 mr-sm-2" name="status"> 
                                <option <?php if($status=='Y'){ echo "selected";}?> value='Y'>Active</option>
                                <option <?php if($status=='N'){ echo "selected";}?> value='N'>Deactive</option>
                            
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
        $sem_name=$_REQUEST['sem_name'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($sem_name) && !empty($status))
            {
                $q3="update sem set sem_name='$sem_name',status='$status' where id='$id'";
                if(mysqli_query($con,$q3))
                {
                echo "<h1><center>Update Successfuly.</center></h1>";
                //header("location:branch.php");
                echo "<script>window.location.href = 'sem.php';</script>";
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