<?php
include "header.php";
echo "<div class='container-fluid'>";
    global $con ;
    function lab_lecture_sequence($sem_id,$branch_id,$attandance_date){
        global $con;
        $temp = "";
        $q="select lab_lecture_sequence,sub_id,lab_lecture from attendance where sem_id=$sem_id && branch_id=$branch_id && date='$attandance_date' ORDER BY lab_lecture_sequence ASC";   
        if($s=mysqli_query($con,$q))
        {
            while ($r=mysqli_fetch_assoc($s))
            {
                $lab_lecture = $r['lab_lecture'];
                $sub_id = $r['sub_id'];
                $q3 = "select sub_name from subject where id=$sub_id";
                if($s3=mysqli_query($con,$q3))
                {

                    if($r3=mysqli_fetch_assoc($s3))
                    {
                        $ans = "<th>".$r3['sub_name']."(".$lab_lecture.")"."</th>";
                    }
                }
                else{
                    echo mysqli_error($con);
                }
                $temp = $temp.$ans;
            }
            
            return $temp;
        }
    }
    function p_a($sem_id,$branch_id,$attandance_date,$en_roll,$per_check){
        global $con ; 
        $flag=0;
        $r= "";
        $ans= "";
        $conter=0;
        $p_conter=0;
        $q="select students_attendance from attendance where sem_id=$sem_id && branch_id=$branch_id && date='$attandance_date' ORDER BY lab_lecture_sequence ASC";
        if($s=mysqli_query($con,$q))
        {
            while ($r=mysqli_fetch_assoc($s))
            {
                $conter++;
                $flag=0;
                $v = $r['students_attendance'];
                $attandance = explode(",",$v);
                foreach($attandance as $value)
                {
                    if($en_roll==$value)
                        $flag=1;
                      
                      
                }
                if($flag==1)
                {
                    $r = "<td><label style='color:cyan; font-weight: 900;'>P</label></td>";
                    $p_conter++;
                }
                else
                {
                    $r = "<td><label style='color:red; font-weight: 900;'>A</label></td>";
                }
                $ans = $ans . $r;

            }
            $per = ($p_conter *100) / $conter ;
            $ans= $ans."<td>$per%</td>";
            
        }
        
        if($per_check != null)
        {
            if($per <= $per_check)
            {
                return $ans ;
            }else
            {
                return 1;
            }   
        }
        else {return $ans ;}
    }
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class='jumbotron'>
    <div class='card'>
        <div class='card-header'>
            <form action="#">
                    <div class="form-group row">
                            <div class="col-md-3 col-sm-3">
                            <label for="">Branch:</label>
                               <?php
                               $id = $_SESSION['t_login']['branch_id'];
                                $q="select b_name from branch where id=$id";
                                if($s=mysqli_query($con,$q))
                                {
                                    if($r=mysqli_fetch_assoc($s))
                                    {
                                        echo $r['b_name']; 
                                    }
                                }
                                else{ echo mysqli_error($con);}
                            
                                ?>
                            </select>
                            </div>
                            <div class="col-md-3 col-sm-3">    
                            <select class="custom-select my-1 mr-sm-2" name="sem_id" id="sem">
                                <option disabled selected value="">Sem</option>
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
                            <div class='my-1 col-md-3 col-sm-3'>
                                    <input class='dateselect form-control' type='date' name='attandance_date' placeholder='Enter date of lecture / lab' id=''> 
                            </div>
                            <div class='my-1 col-md-3 col-sm-3'>
                                    <input class='form-control' type='text' name='less_then' placeholder='<(Less Then %)'>
                            </div>
                            <div class="my-1 col-md-3 col-sm-3">   
                                <input class="btn btn-dark" type="submit" value="Get Details" name="submit">
                            </div> 
                    </div>
            </form>
        </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">
    
</body>
</html>
            <?php
            if(isset($_REQUEST['submit'])){
                $sem_id=$_REQUEST['sem_id'];
                $branch_id=$_SESSION['t_login']['branch_id'];  
                $attandance_date = $_REQUEST['attandance_date']; 
                if(isset($_REQUEST['less_then']))
                {
                        $per_check = $_REQUEST['less_then'];   
                }
                else {
                        $per_check = null ; 
                }      
                        $q="select en_roll,f_name,m_name,l_name from student_details where sem_id=$sem_id AND branch_id=$branch_id";
                        echo "<form method='post' action=''>";
                        if($s=mysqli_query($con,$q))
                        {
                            echo "<li class='list-group-item'>";
                            echo "<table id='table2excel' class='table table-dark table-hover table-bordered table-responsive-md table-responsive-sm'>
                                <tr>
                                <th>NO.</th>
                                <th>NAME</th>
                                <th>EN_ROLL</th>
                                ".lab_lecture_sequence($sem_id,$branch_id,$attandance_date)."
                                <th>PERCENTAGE</th>
                                </tr>";
                            $count=1;
                            while($result=mysqli_fetch_assoc($s))
                            {   
                                $en_roll = $result['en_roll'];
                                $ans_details = "<td>".$count++."</td>"
                                    ."<td>".$result['f_name']." ".$result['m_name']."   ".$result['l_name']."</td>"
                                    ."<td>".$en_roll."</td>";
                                $ans_pa =  p_a($sem_id,$branch_id,$attandance_date,$en_roll,$per_check);
                                if($ans_pa!=1)
                                {
                                    echo "<tr>".$ans_details.$ans_pa."</tr>" ;
                                }   
                            }
                            echo "</table>";
                            echo "</li>";
                               echo "</form>";    
                        }
                        else{
                            echo mysqli_error($con);
                        }
            }
            echo "<button class='btn btn-dark' onclick='ExportToExcel(table2excel)'>EXPORT TO EXL SHEET</button>";
            echo "</ul>";
            echo "</div>";
    echo "</div>";
    echo "</div>";
echo "</div>";
?>
<!DOCTYPE html>
<html lang="en">
<script>
    $("button").click(function(){
        $("#table2excel").table2excel({
            filename:"student_attendance.xls"
  });
});

</script>
</html>