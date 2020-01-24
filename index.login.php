<?php
include_once 'assets/db.php';
?>
<?php
session_start();
?>

<!--loging verification code goes here-->

<?php


if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($conn,  $_POST['email']);
  $pwd = mysqli_real_escape_string($conn,  $_POST['pwd']);


$pwd2 = $pwd.$pwd;
  
  /*empty spaces handlellers*/
  if (empty($email) ||empty($pwd2)){
   echo '<script> alert("The fields are empty")</script>';
    exit();
  }else{
    $sql = "SELECT * FROM user WHERE 	email = '$email'";
    $output = mysqli_query($conn , $sql);
    $check_output = mysqli_num_rows($output);
    if ($check_output <1) {
   echo '<script> alert("You are not yet registered....please signup")</script>';
    
    }elseif ($row = mysqli_fetch_assoc($output)){
        # dehashing the password
      $hashedpwdcheck = password_verify($pwd2, $row['password']);
       if ($hashedpwdcheck == false){
          echo '<script> alert("Your password is not correct")</script>';
         }elseif ($hashedpwdcheck == true){
          #login the user
          $_SESSION['useremail'] = $row['email'];
          $_SESSION['userpwd'] = $row['password'];
           $_SESSION['username'] = $row['username'];
            $_SESSION['fname'] = $row['first_name'];
           $_SESSION['lname'] = $row['last_name'];
          header("location: index.log.php?login=success");
          /*exit();*/
        }
      }
    
    }
  }
?>


<!DOCTYPE html>


<html>
<head>
	<title>online| DBMS</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.min.css">

	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
 


</head>
<body >
	<?php
include_once "assets/header.php";
	?>

<?php
if (isset($_GET['logid'])) {

	$logid = $_GET['logid'];
	if ($logid == 1) {
		?>

<section class="container my-5">
  <div class="row">
    <div class="col-md-3">
      
    </div>
   <div class="col-md-6 my-5 border shadow-lg rounded">
      <div class="form">
        <form class="form-defult" method="POST" action="#">
          <h3 class="text-center mt-3"><i class="fa fa-user"></i> Login</h3>
          <div class="form-group">
            <label><i class="fa fa-envelope"></i> Email</label>
          <input type="email" class="form-control" name="email" required placeholder="Enter the Email">
          </div>
          <div class="form-group">
            <label><i class="fa fa-lock"></i> Password</label>
            <input type="password" class="form-control" name="pwd" required placeholder="Enter the Password">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control bg-primary text-white shadow rounded" name="login" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

		<?php
	}else{
		?>


		<!-- signg up code goes here -->



<!-- signg up code goes here -->

<?php
$errors = array();
if (isset($_POST['signup'])) {

	$email = mysqli_real_escape_string($conn,  $_POST['email']);
	$pwd = mysqli_real_escape_string($conn,  $_POST['pwd']);
	$pwd2 = mysqli_real_escape_string($conn,  $_POST['pwd2']);
	$fname = mysqli_real_escape_string($conn,  $_POST['fname']);
	$lname = mysqli_real_escape_string($conn,  $_POST['lname']);
	$uname = mysqli_real_escape_string($conn,  $_POST['uname']);
	
	/*empty spaces handlellers*/
	if (empty($email) || empty($pwd) || empty($pwd2)||empty($fname)||empty($lname)||empty($uname)){
		header("location: index.login.php?logid= 2");
		
		}
		//password
		// if($pwd == $pwd2){
		// 	echo "<script>alert('passwords are not the same')</script>";
		// 	exit();
		// }

	//validating email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: index.login.php?logid= 2 =email");
		
		}

	//checking if user exists
		$sql = "SELECT * FROM user WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				if ($resultcheck > 0) {
					echo "<script>alert('Sorry the Email has been regsyered by someone else')</script>";
					header("location: index.login.php?logid= 2 =email taken");
				}
	if (count($errors) == 0) {


$pwd3 = $pwd.$pwd2;


	$hashformat = "$2y$10$";
	$salt = "ineedsomecrazystrings22";
	$hashf_and_salt = $hashformat . $salt;
	$Rpwd_pwd = crypt($pwd3,$hashf_and_salt);

    /*inserting data*/
	$query = "INSERT INTO user(first_name,last_name,password,email,username)";
	$query .= "VALUES('$fname','$lname','$Rpwd_pwd','$email','$uname')";

	$test = mysqli_query($conn,$query);

	/*$_SESSION['email'] = $email;
	$_SESSION['success'] = "Welcome to Chisfarm";*/
	if (!$test){
?>

<h5 class="py-1 mt-5 bg-success text-white text-center"> Registration not done <span class="fa fa-triangle text-danger"></span></h5>

	<?php
}
else 
{
	?>

<h5 class="py-1 mt-5 bg-success text-white text-center"> Registration is successfull </h5>

	<?php


}

	}

	}
?>


<!--signup code ends here-->

		<section class="container">
	<div class="row">
		<div class="col-md-6 my-5">
			<div class="form border shadow-lg rounded">
				<form class="form-defult px-2" method="POST" action="#">
					<h3 class="text-center"><i class="fa fa-pencil"></i> Signup</h3>
					<div class="form-group">
						<label><i class="fa fa-user"></i> Firstname</label>
					<input type="text" class="form-control" name="fname" required placeholder="Enter your Firstname">
					</div>
					<div class="form-group">
						<label><i class="fa fa-user"></i> Lastname</label>
					<input type="text" class="form-control" name="lname" required placeholder="Enter your Laststname">
					</div>
					<div class="form-group">
						<label><i class="fa fa-envelope"></i> Email</label>
					<input type="email" class="form-control" name="email" required placeholder="Enter the Email">
					</div>
					<div class="form-group">
						<label><i class="fa fa-user"></i> Username</label>
					<input type="text" class="form-control" name="uname" required placeholder="Enter your Username">
					</div>
					<div class="form-group">
						<label><i class="fa fa-key"></i> Password</label>
						<input type="password" class="form-control" name="pwd" id="pwd1"  required placeholder="Enter the Password">
					</div>
					<div class="form-group">
						<label><i class="fa fa-key"></i>Confirm Password</label>
						<input type="password" class="form-control" id="password" name="pwd2" onkeyup="validatePwd()" required placeholder="Confirm Password">
						<small id="pwd2" class="text-danger"></small>
					</div>
					<div class="form-group">
						<input type="submit" class="form-control bg-primary text-white"  name="signup" value="Signup">
					</div>
				</form>
				<script>
					function validatePwd() {
					var x =	document.getElementById('pwd1').value;
					var y =	document.getElementById('password').value;
					if (x == y){
						document.getElementById('pwd2').innerHTML = "password match*";
					}else{
						document.getElementById('pwd2').innerHTML = "password do not match*";
					}
					
					}
				</script>
			</div>
		</div>
		<div class="left-done col-md-6 my-5">
			<div>
				<div class="border pb-5 shadow-lg rounded">
					<h3 class="text-center mt-5 pt-5"><i class="fa fa-users"></i> Connect with Social Links</h3>
					<div class="ml-5 pl-5 mt-5">
						<a href="#"><i class="fa fa-facebook-official fa-2x"></i> Facebook</a>
					</div>
					<div class="ml-5 pl-5 mt-5">
						<a href="#" class="text-dark"><i class="fa fa-google fa-2x "></i> Google Account</a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>

		<?php
	}
}


?>

	<?php
include_once "assets/footer.php";
	?>

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
</body>
</html>