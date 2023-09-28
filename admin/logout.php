<?php
include "header.php";
if(session_destroy())
{
    header("location:index.php");
}
?>