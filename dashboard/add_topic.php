 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Project Topic | Manager</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="../asset/css/lib/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/css/lib/themify-icons/themify-icons.css">
    <link href="../asset/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="../asset/css/lib/sidebar.css" rel="stylesheet">
    <link href="../asset/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/lib/unix.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

<?php include 'nav.php';
include 'header.php';?>

    <!-- END chat Sidebar-->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="home.php">Dashboard</a></li>
                                    <li class="topics.php">Topics</li>
                                    <li class="active">Add Topic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Topic Registration</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method ="POST" action="add_topic.php">
                                           <div class="row">
                                                <div class="col-xs-5">
                                                     <div class="form-group">
                                                    <input type="text" name="student_name" class="form-control input-default " placeholder="Student name" >
                                                     </div>
                                                 </div>
                                                 <div class=" col-xs-offset-1 col-xs-5">
                                                     <div class="form-group">
                                                    <input type="text" name="supervisor_name" class="form-control input-default " placeholder="Supervisor name" >
                                                     </div>
                                                 </div>
                                           </div>
                                           <div class="row">
                                                <div class="col-xs-5">
                                                     <div class="form-group">
                                                    <input type="text" name="matric_number" class="form-control input-default " placeholder="Matric Number" >
                                                     </div>
                                                 </div>
                                                 <div class=" col-xs-offset-1 col-xs-5">
                                                     <div class="form-group">
                                                   <select name="platform" class="form-control" >
                                                   <option selected disabled> Choose Project Platform</option>
                                                   <option value="Web">Web</option>
                                                   <option value="Mobile (Android)">Mobile (Android)</option>
                                                   <option value="Mobile (IOS)">Mobile (IOS)</option>
                                                   <option value="Mobile (USSD)">Mobile (USSD)</option>
                                                   <option value="Desktop Application">Desktop Application</option>
                                                   </select>
                                                     </div>
                                                 </div>
                                           </div>
                                           <div class="row">
                                                <div class=" col-xs-offset col-xs-5">
                                                    <div class="form-group">
                                                    <select name="users" class="form-control" >
                                                   <option selected disabled> Select Users</option>
                                                   <option value="Individual">Individual</option>
                                                   <option value="Group">Group</option>
                                                   </select>
                                                    </div>
                                                </div>
                                                 <div class=" col-xs-offset-1 col-xs-5">
                                                     <div class="form-group">
                                                   <select name="level" class="form-control" >
                                                   <option selected disabled> Select student level</option>
                                                   <option value="ND">ND</option>
                                                   <option value="HND">HND</option>
                                                   </select>
                                                     </div>
                                                 </div>
                                           </div>
                                          <div class="row">
                                          <div class="form-group">
                                            <div class="col-xs-6">
                                                     <div class="form-group">
                                                    <input type="text" name="project_topic" class="form-control input-default " placeholder="Project topic" >
                                                     </div>
                                                 </div>
                                            </div>

								        <div class="form-group">
                                        <input type="submit" value="Add Topic" name="add_topic" class="btn-success btn-md" >
                                          </div>
                                          <?php

                                            include 'connect.php';
                                            include '../assets/db.php';
                                             if(isset($_POST['add_topic']))
                                             {
                                                 $studentname=$_POST['student_name'];
                                                 $projecttopic=$_POST['project_topic'];
                                                 $level=$_POST['level'];
                                                 $users=$_POST['users'];
                                                 $matricnumber=$_POST['matric_number'];
                                                 $supervisorname=$_POST['supervisor_name'];
                                                 $platform=$_POST['platform'];
                                                
                                              if (!empty($studentname) && (!empty($projecttopic)) && (!empty($supervisorname))&& (!empty($platform))&& (!empty($matricnumber))&& (!empty($level))&& (!empty($users)) )
                                              {
                                               
                                                    $select_query=mysqli_query($mycon,"SELECT * from topics where projecttopic = '".$projecttopic."' ");

                                                    if (mysqli_num_rows($select_query)>0)
                                                    {
                                                      echo  '<script>alert("Project topic already exists")</script>';

                                                    }
                                                    
                                                    else
                                                    {
                                                        $query_insert= mysqli_query($mycon,"INSERT INTO topics (id,studentname,supervisor,matricnumber,projecttopic,projectplatform,date,status,level,users)
                                                        VALUES
                                                        ('','$studentname','$supervisorname','$matricnumber','$projecttopic','$platform',null,'','$level','$users') ");

                                                        if ($query_insert)
                                                        {
                                                         echo  '<script>alert("Project topic successfully registered")</script>';

                                                        }

                                                        else 
                                                        {
                                                            echo mysqli_error($query_insert);
                                                        }
                                                    }

                                              }
                                              else
                                              {
                                                  echo  '<script>alert("Fill up the fields completely");</script>';
                                              }

                                             }
                                        ?>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div>
				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->
    <script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->





</body>

</html>
