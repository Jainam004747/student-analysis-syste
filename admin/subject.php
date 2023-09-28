<?php
    include "header.php";
    echo "<div class='container-fluid'>";
    echo "<div class='jumbotron'>";
    echo "<div class='card'>";
        echo "<div class='card-header'>";
        echo "<h2>Subject Details<h2>";
        echo "</div>";
        echo "<div class='card-body'>";
    global $con;
    function branch_print($bid){
        global $con;
        $q2="select b_name from branch where id=$bid";
                        if($s2=mysqli_query($con,$q2))
                        {
                            if($r2=mysqli_fetch_assoc($s2))
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
                            if($r2=mysqli_fetch_assoc($s2))
                            {
                                 return $r2['sem_name'];
                            }
                        }
                        else{ echo mysqli_error($con);}
    }
    function teacher_print($tid){
        global $con;
        $q2="select teacher_name from teacher_details where id=$tid";
                        if($s2=mysqli_query($con,$q2))
                        {
                            if($r2=mysqli_fetch_assoc($s2))
                            {
                                 return $r2['teacher_name'];
                            }
                        }
                        else{ echo mysqli_error($con);}
    }
        $q="select * from subject";

            if($s=mysqli_query($con,$q))
            {
                echo "<table class='table table-dark table-hover table-bordered table-responsive-md table-responsive-sm mt-5'>
                    <tr>
                    <th>NO.</th>
                    <th>SUBJECT</th>
                    <th>BRANCH</th>
                    <th>SEM</th>
                    <th>TEACHER NAME</th>
                    <th>STATUS</th>
                    <th colspan='2'>Edit/Delete</th>
                    <th>LAST_UPDATE</th>
                    </tr>";
                $count=1;
                while($result=mysqli_fetch_assoc($s))
                {
                    $id=$result['id'];
                    $bid=$result['branch_id'];
                    $sid=$result['sem_id'];
                    $tid=$result['teacher_id'];
                    echo "<tr>"
                        ."<td>".$count++."</td>"
                        ."<td>".$result['sub_name']."</td>"
                        ."<td>".branch_print($bid)."</td>"
                        ."<td>".sem_print($sid)."</td>"
                        ."<td>".teacher_print($tid)."</td>"
                        ."<td>".$result['status']."</td>"
                        ."<td>"."<a class='btn btn-success' href='subject_edit.php?subject_id=$id'>Edit</a>"."</td>"
                        ."<td>"."<a class='btn btn-danger' href='delet.php?subject_id=$id'>Delete</a>"."</td>"
                        ."<td>".$result['last_update']."</td>"
                        ."</tr>";
                }
                echo "</table>";
                
                echo "<a href='subject_add.php' class='btn btn-dark'>ADD</a>";
            }
            else{
                echo mysqli_error($con);
            }
            echo "</div>";
    echo "</div>"; 
    echo "</div>";
    echo "</div>";   
?>