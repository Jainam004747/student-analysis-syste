<?php
include "header.php";
echo "<div class='container-fluid'>";
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- select deselect all -->
    <script>
        // select all
        $(document).ready(function(){
            $('#selectall').on('click',function(){
                if(this.checked){
                    $('.checkbox').each(function(){
                        this.checked = true;
                    });
                }else{
                    $('.checkbox').each(function(){
                        this.checked = false;
                    });
                }
            });
            $('.checkbox').on('click',function(){
                if($('.checkbox:checked').length == $('.checkbox').length){
                    $('#selectall').prop('checked',true);
                }else{
                    $('#selectall').prop('checked',false);
                }
            });
        });
        //system date time
            function zeroPadded(val) {
                if (val >= 10)
                    return val;
                else
                    return '0' + val;
            }
            $(document).ready(function(){
                d = new Date();
                $('input[type=date]').val(d.getFullYear()+"-"+zeroPadded(d.getMonth() + 1)+"-"+zeroPadded(d.getDate()));
            });
            $('#dateselect').datepicker({
                format: 'yyyy/mm/dd',
                // startDate: '-3d'
            });
    </script>
</head>
<body>
    <div class='jumbotron'>
    <div class='card'>
        <div class='card-header'>
            <form action="">
                    <div class="form-group row">
                            <div class="col-md-5 col-sm-5">
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
                            </div>
                            <div class="col-md-5 col-sm-5">    
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
                            <div class="my-1 col-md-2 col-sm-2">   
                                <input class="btn btn-dark" type="submit" value="Submit" name="submit">
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
                        $q="select en_roll,f_name,m_name,l_name from student_details where sem_id=$sem_id AND branch_id=$branch_id";
                        echo "<form method='post' action=''>";
                        if($s=mysqli_query($con,$q))
                        {
                            echo "<li class='list-group-item'>";
                            echo "<table class='table table-dark table-hover table-bordered table-responsive-md table-responsive-sm'>
                                <tr>
                                <th><input type='checkbox' class='' id='selectall' name='selectall'> SELECT ALL</th>
                                <th>NO.</th>
                                <th>EN_ROLL</th>
                                <th>NAME</th>
                                </tr>";
                            $count=1;
                            while($result=mysqli_fetch_assoc($s))
                            {   
                                $en_roll = $result['en_roll'];
                                echo "<tr>
                                     <td><input type='checkbox' class='checkbox'  id='checkbox' value='$en_roll' name='checkbox[]' ></td>"
                                    ."<td>".$count++."</td>"
                                    ."<td>".$en_roll."</td>"
                                    ."<td>".$result['f_name']." ".$result['m_name']." ".$result['l_name']."</td>"
                                    ."</tr>";
                            }
                            echo "</table>";
                            echo "</li>";
                                    echo "<div class='row'>";    
                                        echo "<div class='col-md-3 col-sm-3'>    
                                            <select class='custom-select my-1 mr-sm-2' name='lab_lecture'>
                                            <option disabled selected value=''>LAB/LACTURE</option>
                                            <option  value='lecture'>LECTURE</option>
                                            <option  value='lab'>LAB</option></select></div>";

                                        echo "<div class='col-md-3 col-sm-3'>    
                                            <select class='custom-select my-1 mr-sm-2' name='sub_id'>
                                            <option disabled selected value=''>Subject</option>";
                                            $q2="select * from subject where sem_id=$sem_id AND branch_id=$branch_id";
                                            if($s2=mysqli_query($con,$q2))
                                            {
                                                while($r2=mysqli_fetch_assoc($s2))
                                                {
                                                    echo "<option value='".$r2['id']."'>".$r2['sub_name']."</option>"; 
                                                }
                                            }
                                            else{ echo mysqli_error($con);}
                                        echo "</select></div>";
                                        
                                        echo "<div class='col-md-3 col-sm-3'>    
                                                    <select class='custom-select my-1 mr-sm-2' name='lab_lecture_sequence'>
                                                    <option disabled selected value=''>LAB/LACTURE SEQUENCE</option>
                                                    <option  value='1'>1</option>
                                                    <option  value='2'>2</option>
                                                    <option  value='3'>3</option>
                                                    <option  value='4'>4</option>
                                                    <option  value='5'>5</option>
                                                    <option  value='6'>6</option>
                                                    <option  value='7'>7</option>
                                                    </select></div>";
                                        echo"<div class='my-1 col-md-3 col-sm-3'>
                                              <input class='dateselect form-control' type='date' name='attandance_date' placeholder='Enter date of lecture / lab' id=''>"; 
                                        echo "</div>";
                                        
                                        echo "<div class='my-1 ml-3'>   
                                              <input class='btn btn-dark' type='submit' value='Submit' name='submit2'>";
                                        echo "</div>"; 
                                    echo "</div>";
                                    echo "<input type='hidden' id='sem_id' name='sem_id' value='$sem_id'>
                                          <input type='hidden' id='branch_id' name='branch_id' value='$branch_id'>";
                            echo "</form>";
                        }
                        else{
                            echo mysqli_error($con);
                        }
            }
            echo "</ul>";
            echo "</div>";
    echo "</div>";
    echo "</div>";
echo "</div>";

if(isset($_REQUEST['submit2'])){
    //$teacher_id =
    
    $branch_id =   $_REQUEST['branch_id'];
    $sem_id =  $_REQUEST['sem_id'];
    $sub_id =  $_REQUEST['sub_id'];
    $date   =  $_REQUEST['attandance_date'];
    $lab_lecture = $_REQUEST['lab_lecture'];
    $lab_lecture_sequence =  $_REQUEST['lab_lecture_sequence'];
    $checkbox_array =  $_REQUEST['checkbox'];
    $students_attendance = implode(",",$checkbox_array);
   
    if(!empty($branch_id) && !empty($sem_id) && !empty($sub_id) && !empty($date) && !empty($lab_lecture) && !empty($lab_lecture_sequence) && !empty($students_attendance))
            {
                $q="insert into attendance (branch_id,sem_id,sub_id,date,lab_lecture,lab_lecture_sequence,students_attendance) values ('$branch_id','$sem_id','$sub_id','$date','$lab_lecture','$lab_lecture_sequence','$students_attendance')";
                if(mysqli_query($con,$q))
                {
                    echo "<h1><center>inserted Successfuly.</center></h1>";
                   // header("location:branch.php");
                    echo "<script>window.location.href = 'dashbord.php';</script>";
                }else
                {
                    echo mysqli_error($con);
                }
            }
            else{
                echo "<h1><center>pls enter all fields</center></h1>";
            }

}    
?>