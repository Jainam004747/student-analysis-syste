<?php 
function in($val)
{
    $val=strtolower($val);
    $val=htmlentities($val);
    return $val;
    
}


echo in("<h1>HARDIK</h1>");

?>