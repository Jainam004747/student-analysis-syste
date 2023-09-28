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
            <h2>ADD BRANCH</h2>
            </div>
            <div class="card-body">
                    <form action="" method="post" class="" >
                            <div class="form-group row">   
                                    <label for="bname" class="col-md-2 col-form-label">Branch Name</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" id="bname" name="b_name" placeholder="Enter branch name">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="status" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                    <select class="custom-select my-1 mr-sm-2" id="status" name="status">
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
        $b_name=$_REQUEST['b_name'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($b_name) && !empty($status))
            {
                $q="insert into branch (b_name,status) values ('$b_name','$status')";
                if(mysqli_query($con,$q))
                {
                echo "<h1><center>inserted Successfuly.</center></h1>";
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