<?php
include 'connect.php';
include '../assets/db.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cloud Computing | HomePage</title>

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
    <link href="../asset/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../asset/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../asset/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="../asset/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="../asset/css/lib/sidebar.css" rel="stylesheet">
    <link href="../asset/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/lib/unix.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <?php include 'nav.php';
    include 'header.php'; ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row" style="margin-top:px;">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class=" col-lg-4 p-0">
                        <div class="page-header">

                            <div class="page-title">
                                <ol class="breadcrumb text-right">

                                    <li ><a data-toggle="modal" data-target="#add_folder"> <i class="ti-folder"></i> Create New Folder</a> </li>
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li><?php include_once './modal/add_folder.php'; ?>
                                    <?php
                                    include 'connect.php';
                                    if (isset($_POST['addfolder'])) {
                                        $name = addslashes($_POST['name']);
                                        $inner = "../../" . $name;
                                        $path = "../" . $name;
                                        mkdir($path, 0777, true);
                                        chmod($path, 0755);
                                        $add ="INSERT INTO folder(name) VALUES('$name')";

                                        $addfolder = mysqli_query($mycon, $add);
                                        if ($addfolder) {
                                            echo "<script> alert('Folder Created')</script>";
                                        }else{
                                             echo "<script> alert('Folder Not Created')</script>";
                                        }
                                    }
                                    ?>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- /# row and  -->
                <div class="main-content">
                    <?php include 'widget.php'; ?>
                    <!-- /# row -->

<!--Adding a file to the database -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4><i class="ti-cloud-up" aria-hidden="true"></i> File Uploaded</h4>
                                </div>
                                <div class="card-body">
                                    <form action="index.php" method="POST" enctype="multipart/form-data">
                                        .<div class="form-group">
                                            <label for="my-input">Filename</label>
                                            <input id="my-input" class="form-control" required type="file" name="file">
                                        </div>
                                        .<div class="form-group">
                                            <label for="my-input">Select Folder</label>
                                            <select name="folder" required id="" class="form-control">
                                                <option value="apks">Apks</option>
                                                <option value="docs">Docs</option>
                                                <option value="images">Images</option>
                                                <option value="musics">Music</option>
                                                <option value="videos">Video</option>
                                            </select>
                                        </div>
                                        <div class="form-group mg-t-8">
                                            <button type="submit" name="upload" class="btn-fill-lg btn btn-primary btn-block btn-gradient-yellow btn-hover-bluedark"><i class="ti-cloud-up"></i> Upload</button>
                                        </div>
                                        <?php 
                                        include 'connect.php';
                                        if(isset($_POST['upload']))
                                        {
                                           $rand=rand(10000000,99999999);
                                           $file=$rand.$_FILES['file']['name'];
                                           $folder=strtolower($_POST['folder']);
                                           $file_tmp=$_FILES['file']['tmp_name'];
                                           $filesize=$_FILES['file']['size']."<br>";
                                           @$original =round($filesize/1000,2);
                                           $id="1";
                                           $status="1";
                                        
                                           $destination ="../".$folder."/".$file;
                                           $move= move_uploaded_file($file_tmp,$destination);

                                            $insert = "INSERT INTO file values('','" . $file . "','" . $original . "','" . $folder . "','" . $destination . "','" . $id. "',null,'" . $status . "')";
                                            $query = mysqli_query($mycon, $insert); 
                                            if ($query)
                                            {
                                                if ($move)
                                                {
                                                    echo "moved";
                                                }
                                                else
                                                {
                                                    echo mysqli_error($move);
                                                }
                                                
                                                echo '<script>location.replace("index.php")</script>';

                                            }

                                             else
                                             {
                                                echo '<script>alert ("fields cannot appear empty");<script>';
                                             }
                                                
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h4><i class="ti-cloud" aria-hidden="true"></i> Recent File Uploaded</h4>
                            </div>
                            <div class="card-body">
                                <?php include 'recent_project_list.php'; ?>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->

            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
    </div><!-- /# content wrap -->



    <script src="../assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="../assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="../assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="../assets/js/lib/mmc-common.js"></script>
    <script src="../assets/js/lib/mmc-chat.js"></script>
    <!--  Chart js -->
    <script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../assets/js/lib/chart-js/chartjs-init.js"></script>
    <!-- // Chart js -->

    <!--  Datamap -->
    <script src="../assets/js/lib/datamap/d3.min.js"></script>
    <script src="../assets/js/lib/datamap/topojson.js"></script>
    <script src="../assets/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="../assets/js/lib/datamap/datamap-init.js"></script>
    <!-- // Datamap -->-->
    <script src="../assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/lib/weather/weather-init.js"></script>
    <script src="../assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="../assets/js/scripts.js"></script><!-- scripit init-->
</body>

</html>