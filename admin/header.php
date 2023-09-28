<?php 
include "../include/connect.php";
include "include/session_check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jq.js" ></script>
    <script src="../js/table2exel.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.12.1-web/css/all.css">
    <link rel="stylesheet" href="css/sidemenu.css">
<!--    <link rel="stylesheet" href="../css/fontawesome.min.css">-->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <title>adminpanel</title>
    <!--toggle-btn script-->
    <script>
                function sidebar(){
                $('#sidebar').toggleClass('sidebar-active','sidebar');
                }
    </script>
</head>
<body>
    <!-- nav bar top -->
    <nav class="navbar navbar-expand-md navbar-dark header sticky-top">
            <!--togge-btn-->    
            <div class="toggle-btn" id="toggle-btn" onclick="sidebar()">
                            <span></span>
                            <span></span>
                            <span></span>
            </div>
            <!-- admin name -->
            <a class="navbar-brand" href="#">
                <h2 class="ml-3 pr-1 pl-2">Hello <span><?php echo $_SESSION['user_login']['uname']?></span>
                </h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <!-- search bar -->
                    <li class="nav-item ml-1 mr-1">
                        <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success my-1 " type="submit">Search</button>
                        </form>
                    <!-- logout -->
                    </li> 
                    <li class="nav-item mr-1 ml-1 mt-1">
                        <a href="logout.php" class="btn btn-success">LogOut</a>
                    </li>
                </ul>
            </div>
    </nav>
    </div>
    <!-- side menubar -->
    <div>
        <nav id="sidebar" class="sidebar">
        <div class="p-3 pt-2">     
                                                  
                <ul>
                    <li><a href="Adminuser.php"><i class="fas fa-chart-line"></i> Admin Usser</a></li>
                    <li><a href=""><i class="fas fa-chart-line"></i> Dashbord</a></li>
                    <li><a href="#pageSubmenu" data-toggle="collapse" class="dropdown-toggle" aria-expanded="false"><i class="fas fa-university"></i> Academic</a> </li>
                            <ul class="collapse list-unstyled p-3" id="pageSubmenu">
                                <a href="branch.php"><li>branch</li></a>
                                <a href="sem.php"><li>Semister</li></a>
                                <a href="subject.php"><li>Subject</li></a>
                            </ul>    
                    
                    <li><a href="student.php"><i class="fas fa-user-graduate"></i> Manage Students</a></li>
                    <li><a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i> Manage Teachers</a></li>
                    <li><a href="take_attandance.php"><i class="fas fa-school"></i> Student Attandance</a></li>
                    <li><a href="attandance_analysis.php"><i class="fas fa-school"></i> Attandance Analysis</a></li>
                </ul>
             
            </nav>
        <div>    
    </div>  
</body>
</html>    