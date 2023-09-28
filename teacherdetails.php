<?php
include "header.php";
echo "<div class='container'>";
echo "<div class='jumbotron'>";
echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<h2>Profile<h2>";
    echo "</div>";
    echo "<div class='card-body'>";
    if($_SESSION['t_login']['gender']=='M')
    {
        $gender = "Male";
    }
    else{
        $gender = "Female";
    }
    $q = "select b_name from branch where id=".$_SESSION['t_login']['branch_id'];
    if($s=mysqli_query($con,$q))
    {
        if($r=mysqli_fetch_assoc($s))
        {
            $branch = $r['b_name'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<body>
<table class='table table-dark table-hover table-bordered table-responsive table-responsive-md table-responsive-sm mt-5'>
      <tr>
            <th><h3>Name :</h3></th>
            <td><h3><?php echo $_SESSION['t_login']['teacher_name'];?></h3></td>
      </tr>
      <tr>
            <th><h3>Email :</th>
            <td><h3><?php echo $_SESSION['t_login']['email'];?></h3></td>
      </tr>
      <tr>
            <th><h3>Gender :</th>
            <td><h3><?php echo $gender;?></h3></td>
      </tr>
      <tr>
            <th><h3>Branch :</th>
            <td><h3><?php echo $branch?></h3></td>
      </tr>
</table>    
</body>
</html>