<?php
    include "header.php";
    echo "<div class='container-fluid'>";
    echo "<div class='jumbotron'>";
    echo "<div class='card'>";
        echo "<div class='card-header'>";
        echo "<h2>Student Details<h2>";
        echo "</div>";
        echo "<div class='card-body'>";
    global $con;
    function branch_print($bid){
        global $con;
        $q2="select b_name from branch where id=$bid";
                        if($s2=mysqli_query($con,$q2))
                        {
                            while($r2=mysqli_fetch_assoc($s2))
                            {
                                 return $r2['b_name'];
                            }
                        }
                        else{ echo mysqli_error($con);}
    }
    function sem_print($sid){
        global $con;
        $q2="select sem_name from sem where id=$sid";
                        if($s2=mysqli_query($con,$q2))
                        {
                            while($r2=mysqli_fetch_assoc($s2))
                            {
                                 return $r2['sem_name'];
                            }
                        }
                        else{ echo mysqli_error($con);}
    }
        $q="select * from student_details";

            if($s=mysqli_query($con,$q))
            {
                echo "<table class='table table-dark table-hover table-bordered table-responsive table-responsive-md table-responsive-sm mt-5'>
                    <tr>
                    <th>NO.</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>MOBILE NO</th>
                    <th>ADDRESS</th>
                    <th>E-MAIL</th>
                    <th>SEM</th>
                    <th>BRANCH</th>
                    <th colspan='2'>Edit/Delete</th>
                    <th>LAST_UPDATE</th>
                    </tr>";
                $count=1;
                while($result=mysqli_fetch_assoc($s))
                {
                    $id=$result['id'];
                    $sid=$result['sem_id'];
                    $bid=$result['branch_id'];
                    echo "<tr>"
                        ."<td>".$count++."</td>"
                        ."<td>".$result['f_name']." ".$result['m_name']." ".$result['l_name']."</td>"
                        ."<td>".$result['gender']."</td>"
                        ."<td>".$result['mobile_no']."</td>"
                        ."<td>".$result['address']."</td>"
                        ."<td>".$result['email']."</td>"
                        ."<td>".sem_print($sid)."</td>"
                        ."<td>".branch_print($bid)."</td>"
                        ."<td>"."<a class='btn btn-success' href='student_edit.php?student_id=$id'>Edit</a>"."</td>"
                        ."<td>"."<a class='btn btn-danger' href='delet.php?student_id=$id'>Delete</a>"."</td>"
                        ."<td>".$result['last_update']."</td>"
                        ."</tr>";
                }
                echo "</table>";
                
                echo "<a href='student_add.php' class='btn btn-dark'>ADD</a>";
            }
            else{
                echo mysqli_error($con);
            }
            echo "</div>"; 
    echo "</div>";    
    echo "</div>"; 
    echo "</div>"; 
?>