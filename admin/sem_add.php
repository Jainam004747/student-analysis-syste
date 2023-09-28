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
            <title>Sem_Add</title>

        </head>
        <body>
            <div class="card-header">
            <h2>ADD SEM</h2>
            </div>
            <div class="card-body">         
                <form action="" method="post" >
                            <div class="form-group row">
                                <label for="sem" class="col-md-2 col-form-label">Sem</label>
                                <div class="col-md-10">
                                <select class="custom-select my-1 mr-sm-2" id="sem" name="sem_name">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                </select>
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
                            <div class="form-group">
                            <input class="btn btn-dark" type="submit" value="insert" name="submit">
                            </div>

                </form>
            </div>
         </body>
        </html>
<?php   
    if(isset($_REQUEST['submit'])){
        $sem_name=$_REQUEST['sem_name'];
        $status=$_REQUEST['status'];
        
        
            if(!empty($sem_name) && !empty($status))
            {
                $q="insert into sem (sem_name,status) values ('$sem_name','$status')";
                if(mysqli_query($con,$q))
                {
                    echo "<h1><center>inserted Successfuly.</center></h1>";
                   // header("location:branch.php");
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