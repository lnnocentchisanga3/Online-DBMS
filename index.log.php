<?php
include_once 'assets/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>user| Dashboard</title>
  <?php
  include_once 'assets/head.php';
  ?>
</head>
<body style="background-color: ">
<?php

require 'assets/header.dashboard.php';
?>

<section class="row mt-5">
  <div class="col-md-2">
    
  </div>
  <ul class="nav justify-content-center bg-light shadow-lg border rounded col-md-8 mt-4">
  <li id="showProfile" class="sh nav-item py-3" >
    <a class="nav-link active ml-1 text-dark hover" href="#">


<?php

$query = "SELECT * FROM user WHERE  email = '$_SESSION[useremail]' ";
$result = mysqli_query($conn, $query);

if (!$result) {
die("failed to get data".mysqli_error($conn));
}else{
while ($row = mysqli_fetch_assoc($result)) {
        
        $propic =$row['profile_pic'];

?>   

          <div class="profile-pic">
          <img class="mx-auto rounded-circle"  src="photos/<?php echo $propic; ?>"  alt="">
        </div>
    
<?php 
}}
?>

  </a>
  </li>
   <script>
    
    document.getElementById('showProfile').addEventListener('click', function() {
      document.getElementById('all').style.display = "none";
      document.getElementById('docx').style.display = "none";
       document.getElementById('profile').style.display = "flex";
    })
  </script>
  <hr>
  <li id="showDocx" class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="#"><i class="fa fa-file-text"></i> Docx</a>
  </li>
  <script>
    
    document.getElementById('showDocx').addEventListener('click', function() {
      document.getElementById('all').style.display = "none";
      document.getElementById('docx').style.display = "flex";
      document.getElementById('profile').style.display = "none";
    })
  </script>
  <hr>
  <li class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="#"><i class="fa fa-music"></i> MP3</a>
  </li>
  <hr>
  <li class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="#"><i class="fa fa-clipboard"></i> Task</a>
  </li>
   <hr>
  <li class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="#"><i class="fa fa-wrench"></i> Tools</a>
  </li>
  <li id="photo" class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="#"><i class="fa fa-photo"></i> photos</a>
  </li>
   <script>
    
    document.getElementById('photo').addEventListener('click', function() {
      document.getElementById('all').style.display = "none";
      document.getElementById('docx').style.display = "none";
      document.getElementById('profile').style.display = "none";
    })
  </script>
  <li class="sh nav-item py-4">
    <a class="nav-link ml-1 text-dark" href="index.log.php"><i class="fa fa-refresh"></i> Refresh</a>
  </li>
</ul>
<div class="row col-md-12">
  <div class="col-md-1">
    
  </div>
  <section id="profile" class="col-md-10 mt-5 shadow-lg rounded border border-light row">
  <div class="container">
  <div class="row">
  <?php

  $query = "SELECT * FROM user WHERE  email = '$_SESSION[useremail]' ";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("failed to get data".mysqli_error($conn));
}else{
  while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['first_name'];
          $lname = $row['last_name'];
          $email = $row['email'];
          $uname = $row['username'];
          $propic =$row['profile_pic']

?>
    
         <div class="col-md-12 mt-5 ml-4 row">
       
        
        <div class="col-md-7 col-sm-12 " >
         <p class="profile ml-1 text-dark float-right" style="font-size:30px;margin-right:50px;" ><em> Profile</em></p>
  </div>
  <div class="col-md-5 col-sm-12 ">
  <button id="showUpdate" class="btn btn-primary float-right shadow"><i class="fa fa-edit"></i> update Profile</button>
        
          
         </div>
          <script>
    
    document.getElementById('showUpdate').addEventListener('click', function() {
      var x = document.getElementById("update");
      var y = document.getElementById('hide');

      y.style.display = 'none';
      x.style.display = "flex";
       })
          </script>
          <div class="col-md-2">
            
          </div>

          
          <form id="hide" style="font-size: 20px;" class="form col-md-8 border mb-2 shadow-lg rounded">
            
        <div class="col-md-12 border-bottom py-3">
          <div class="team-member">
      
            <img class="mx-auto rounded-circle"  src="photos/<?php echo $propic; ?>"  alt="">
           </div>
      </div>

           <div class="col-md-12 text-center border-bottom py-4">
      <em>   <?php echo "FirstName : ".$fname;?>  </em>
        
          </div>
       <div class="col-md-12 text-center border-bottom py-4">
     <em><?php echo "LastName : ".$lname; ?> </em>  
         </div>
          <div class="col-md-12 text-center border-bottom py-4">
       <em><?php echo "Email : ".$email; ?> </em>  
          </div>
          <div class="col-md-12 text-center border-bottom py-4">
     <em> <?php echo "Username :  ".$uname; ?> </em> 
          </div>
          </form>
</div>

<div id="update"  class="col-md-12 mt-5 ml-4 row">
   <div class="col-md-2">
            
          </div>
          <form class="form col-md-8 border mb-5 mt-5 shadow-lg rounded">
            <div class="col-md-12 text-center mt-5 ">
            <i class="fa fa-user-circle fa-4x pb-4"></i>
            <input type="file" name="picture" class="form-control">
          </div>
           <div class="col-md-12 text-center border-bottom py-5">
         <?php echo "Firstname : ".$fname; ?>
         <input type="text" name="fname" class="form-control">
          </div>
          <div class="col-md-12 text-center border-bottom py-5">
         <?php echo "Lastname : ".$lname; ?>
         <input type="text" name="lname" class="form-control">
          </div>
          <div class="col-md-12 text-center border-bottom py-5">
         <?php echo "Email : ".$email; ?>
         <input type="email" name="email" class="form-control">
          </div>
          <div class="col-md-12 text-center pb-1 py-5">
         <?php echo "Username : ".$uname; ?>
         <input type="text" name="uname" class=" ml-2 form-control">
          </div>
          <button type="submit" name="update" class="btn btn-primary col-md-8  ml-2 mb-4"><i class="fa fa-save"></i> save</button>
          </form>
</div>
</div>
<?php
}
}
?>
</section>
</div>

<div class="row col-md-12">
  <div class="col-md-1">
    
  </div>
<section id="all" class="col-md-10 mt-5 shadow-lg rounded border border-light row">

  <?php

  $query = "SELECT * FROM document WHERE  user_email = '$_SESSION[useremail]' ";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("failed to get data".mysqli_error($conn));
}else{
  while ($row = mysqli_fetch_assoc($result)) {
          $docid = $row['document-id'];
          $email = $row['user_email'];
          $doc_name = $row['document_name'];
          $post_date = $row['date_time'];

?>
    
         <div class="col-md-3 mt-5 ml-4">
           <div class="">
          <?php
      echo "<img class='img-thumbnail mx-auto d-block' alt=' "." ".$doc_name." "."' style='width:100%' src='./photos/".$row['document_name']."'>";
      ?>
          </div>
         </div>
     
<?php
}
}
?>
</section>
</div>
<div class="row col-md-12">
  <div class="col-md-1">
    
  </div>

<section id="docx" class="col-md-10 mt-5 shadow-lg rounded border border-light row">
  <div class="col-md-12 p-2">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i></button>
  </div>
    <?php

  $query = "SELECT * FROM document WHERE  user_email = '$_SESSION[useremail]' LIMIT 3";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("failed to get data".mysqli_error($conn));
}else{
  while ($row = mysqli_fetch_assoc($result)) {
          $docid = $row['document-id'];
          $email = $row['user_email'];
          $doc_name = $row['document_name'];
          $post_date = $row['date_time'];

?>
    
         <div class="col-md-3 mt-5 ml-4">
          <a download href="#" class="text-dark">
            <div class="text-center">
          <?php
      echo "<p class='fa fa-file-text fa-5x'></p><br>" . $doc_name;
      ?>
       <?php
      echo $doc_name;
      ?>
          </div>
        </a>
         </div>
     
<?php
}
}
?>
</section>
</div>

<script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modal-pop.js"></script>
   <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
<!--image upload code-->

<?php 
if (isset($_POST['post'])) {


    $target = "./photos/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

  $photo_owner = mysqli_real_escape_string($conn,  $_POST["name"]);
/*-----------------done validation------------*/

  $query = "INSERT INTO document(user_email,document_name) VALUES('$photo_owner','$image')";

  move_uploaded_file($_FILES['image']['tmp_name'], $target);

  $insert = mysqli_query($conn,$query);

  if (!$insert) {
    echo "<p class='border-light ml-5 shadow-lg'>there was an error</p>";
  }else{
    
  }
}


 ?>

          <?php


?>

  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> upload a file</h5>
        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form  method="POST" action="#" enctype="multipart/form-data">
  <div class="form-group">
    <label>File name</label><br>
    <input type="text" name="name" class="form-control col-sm-12 form-control col-sm-12 " value="<?php echo $_SESSION['useremail']; ?>">
  </div>
  <div class="form-group">
    <label class="label" for="inputGroupFile02">Choose file</label><br>
          <input type="file" name="image" id="fileload" class="form-control col-sm-12 form-control col-sm-12 ">
        </div><br>
  <div class="form-group">
    <button class="btn btn-primary" name="post"><i class="fa fa-upload" onclick="newDoc()"></i>upload</button>
  </div>
</div>
</form>
      </div>
     <script>
function newDoc() {
  window.location.assign("index.log.php");
}
</script>
    </div>
  </div>
</div>

</body>
</html>