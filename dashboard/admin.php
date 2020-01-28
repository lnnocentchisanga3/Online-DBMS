 <?php 
 include 'connect.php';?>
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
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/lib/themify-icons/themify-icons.css">
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
                                    <li class="active">Add admin</li>
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
                                    <h4>Admin Registration</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method ="POST" action="admin.php">
                                           <div class="row">
                                                <div class="col-xs-5">
                                                     <div class="form-group">
                                                    <input type="text" name="adminname" class="form-control input-default " placeholder="Full name" >
                                                     </div>
                                                 </div>
                                                 <div class=" col-xs-offset-1 col-xs-5">
                                                     <div class="form-group">
                                                    <input type="number" name="phonenumber" class="form-control input-default " placeholder="Phone number" >
                                                     </div>
                                                 </div>
                                           </div>
                                           <div class="row">
                                                <div class="col-xs-5">
                                                     <div class="form-group">
                                                    <input type="email" name="email" class="form-control input-default " placeholder=" Email Address" >
                                                     </div>
                                                 </div>
                                                 <div class=" col-xs-offset-1 col-xs-5">
                                                 <div class="form-group">
                                                    <input type="text" name="username" class="form-control input-default " placeholder="Username" >
                                                     </div>
                                                 </div>
                                           </div>
                                           <div class="row">
                                                <div class="  col-xs-5">
                                                <div class="form-group">
                                                    <input type="text" name="password" class="form-control input-default " placeholder="Password" >
                                                     </div>
                                                 </div>
                                                 <div class="col-xs-offset-1 col-xs-5">
                                                     <div class="form-group">
                                                    <input type="submit" name="add_admin" class="form-control btn-md btn-success " value="Submit" >
                                                     </div>
                                                 </div>
                                                </div>
                                         
                                            </div> 
                                           </div>
                                          
                                          <?php

                                            include 'connect.php';
                                             if(isset($_POST['add_admin']))
                                             {
                                               $adminname=$_POST['adminname'];
                                               $phonenumber=$_POST['phonenumber'];
                                               $email=$_POST['email'];
                                               $username=$_POST['username'];
                                               $password=$_POST['password'];
                                             
                                              if (!empty($adminname) && (!empty($phonenumber)) && (!empty($email))&& (!empty($username))&& (!empty($password)))
                                              {
                                               
                                                    $select_query=mysqli_query($mycon,"SELECT * from admin where username = '".$username."' ");

                                                    if (mysqli_num_rows($select_query)>0)
                                                    {
                                                      echo  '<script>alert("Username  already exists");</script>';

                                                    }
                                                    
                                                    else
                                                    {
                                                        $query_insert= mysqli_query($mycon,"INSERT INTO admin (id,fullname,phonenumber,email,username,password,date)
                                                        VALUES
                                                        ('','$adminname','$phonenumber','$email','$username','$password',null) ");

                                                        if ($query_insert)
                                                        {
                                                         echo  '<script>alert("Admin  successfully registered")</script>';
                                                         echo '<script>window.location="index.php";</script>';

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
