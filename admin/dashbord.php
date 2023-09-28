<?php
include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .row.content {height: 550px}
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">

         
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Admin Users
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                        <?php
                            $q="select * from admin_login";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Total Teachers
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                    <?php
                            $q="select * from teacher_details";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

           
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                     Total Branches
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                    <?php
                            $q="select * from branch";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Total Students
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                    <?php
                            $q="select * from student_details";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">

         
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Total Subjects
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                        <?php
                            $q="select * from subject";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Attandance taken by software
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                        <?php
                            $q="select * from attendance";

                            if($s=mysqli_query($con,$q))
                            {
                                $count=0;
                                while($result=mysqli_fetch_assoc($s))
                                {
                                    $count++;
                                }
                                echo $count;
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        ?>
                    </span>
                  </div>
                </div> <!-- / .row -->
              </div>
            </div>
            </div>
        </div> <!-- / .row -->
    
        
</div>
</body>
</html>
