<?php
session_start();
if(!isset($_SESSION['t_login']))
{
    header("location: index.php");
}
?>