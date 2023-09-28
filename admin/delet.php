<?php
include "header.php";
ob_start();
global $con;
if(isset($_REQUEST['branch_id']))
{
        $id=$_REQUEST['branch_id'];
        $q="delete from branch where id='$id'";
        if(my_q($q))
        {   header("location:branch.php");   }
}
if(isset($_REQUEST['sem_id']))
{
        $id=$_REQUEST['sem_id'];
        $q="delete from sem where id='$id'";
        if(my_q($q))
        {   header("location:sem.php");   }
}

if(isset($_REQUEST['subject_id']))
{
        $id=$_REQUEST['subject_id'];
        $q="delete from subject where id='$id'";
        if(my_q($q)) 
        {   header("location:subject.php");   }
}

if(isset($_REQUEST['student_id']))
{
        $id=$_REQUEST['student_id'];
        $q="delete from student_details where id='$id'";
        if(my_q($q)) 
        {   header("location:student.php");   }
}

if(isset($_REQUEST['teacher_id']))
{
        $id=$_REQUEST['teacher_id'];
        $q="delete from teacher_details where id='$id'";
        if(my_q($q)) 
        {   header("location:teacher.php");   }
}
if(isset($_REQUEST['admin_id']))
{
        $id=$_REQUEST['admin_id'];
        $q="delete from admin_login where id='$id'";
        if(my_q($q))
        {   header("location:adminuser.php");   }
}
function my_q($q)
{
    global $con;
   if( $r=mysqli_query($con,$q))
    {
        return $r;
    }else
    {
        echo mysqli_error($con);
    }
}

?>