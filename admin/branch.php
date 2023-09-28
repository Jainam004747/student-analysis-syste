<?php
    include "header.php";
    echo "<div class='container-fluid'>";
    echo "<div class='jumbotron'>";
    echo "<div class='card'>";
        echo "<div class='card-header'>";
        echo "<h2>Branch Details<h2>";
        echo "</div>";
        echo "<div class='card-body'>";
        $q="select * from branch";

            if($s=mysqli_query($con,$q))
            {
                echo "<table class='table table-dark table-hover table-bordered table-responsive-md table-responsive-sm  mt-5'>
                    <tr>
                    <th>NO.</th>
                    <th>BRANCH</th>
                    <th>STATUS</th>
                    <th colspan='2'>Edit/Delete</th>
                    <th>LAST_UPDATE</th>
                    </tr>";
                $count=1;
                while($result=mysqli_fetch_assoc($s))
                {
                    $id=$result['id'];
                    echo "<tr>"
                        ."<td>".$count++."</td>"
                        ."<td>".$result['b_name']."</td>"
                        ."<td>".$result['status']."</td>"
                        ."<td>"."<a class='btn btn-success' href='branch_edit.php?branch_id=$id'>Edit</a>"."</td>"
                        ."<td>"."<a class='btn btn-danger' href='delet.php?branch_id=$id'>Delete</a>"."</td>"
                        ."<td>".$result['last_update']."</td>"
                        ."</tr>";
                }
                echo "</table>";
                echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item'><a href='branch_add.php' class='btn btn-dark'>ADD</a></li>";
                echo "</ul>";
            }
            else{
                echo mysqli_error($con);
            }
            echo "</div>";
    echo "</div>"; 
    echo "</div>";  
    echo "</div>";   
?>