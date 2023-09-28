<?php 
include "header.php";
echo "<div class='container'>";    
echo "<div class='jumbotron'>";
    echo "<div class='card'>";
 $id=$_REQUEST['branch_id'];
 $q="select * from branch where id=$id";
 if($s=mysqli_query($con,$q))
 {
     $r=mysqli_fetch_assoc($s);
     $b_name=$r['b_name'];
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
            <h2>EDIT BRANCH</h2>
    </div>
    <div class="card-body">
            <form action="" method="post" class="" >
                            <div class="form-group row">   
                                    <label for="bname" class="col-md-2 col-form-label">Branch Name</label>
                                    <div class="col-md-10">
                                    <input class="form-control" type="text" name="b_name" id="bname" value="<?php echo "$b_name"?>" placeholder="Enter branch name">
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
        $b_name=$_REQUEST['b_name'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($b_name) && !empty($status))
            {
                $q3="update branch set b_name='$b_name',status='$status' where id='$id'";
                if(mysqli_query($con,$q3))
                {
                echo "<h1><center>Update Successfuly.</center></h1>";
                //header("location:branch.php");
                echo "<script>window.location.href = 'branch.php';</script>";
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