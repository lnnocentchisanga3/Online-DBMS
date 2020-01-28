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
<body class="welcome">
	<?php
include_once "assets/header.php";
	?>

<?php
if (isset($_GET['logid'])) {

	$logid = $_GET['logid'];
	if ($logid == 1) {
		?>

<?php
include_once 'assets/db.php';
?>
<?php
session_start();
?>

<!--loging verification code goes here-->

<?php
$PWD;
$notIn;

if (isset($_POST['login'])) {
$fields = 'fields are empty';


  $email = mysqli_real_escape_string($conn,  $_POST['email']);
  $pwd = mysqli_real_escape_string($conn,  $_POST['pwd']);


$pwd2 = $pwd.$pwd;
  
  /*empty spaces handlellers*/
  if (empty($email) ||empty($pwd2)){
   echo $fields;
    exit();
  }else{
    $sql = "SELECT * FROM user WHERE 	email = '$email'";
    $output = mysqli_query($conn , $sql);
    $check_output = mysqli_num_rows($output);
    if ($check_output <1) {
  $notIn = 'The email('.$email.') is not yet registered for the service';
    
    }elseif ($row = mysqli_fetch_assoc($output)){
        # dehashing the password
      $hashedpwdcheck = password_verify($pwd2, $row['password']);
       if ($hashedpwdcheck == false){
          $PWD = 'Your password is not correct';
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
<section class="mt-5">
  <div class="row">
    <div class="col-md-4">
      
    </div>
   <div class="col-md-5 my-5 pb-4 border shadow-lg bg-white">
      <div class="form">
        <form class="form-defult" method="POST" action="#">
          <h3 class="text-center mt-2 mb-5"><i class="fa fa-user-circle fa-3x"></i><br> Login</h3>
          <div class="input-group mt-5">
            <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
		    </div>
          <input type="email" class="form-control form-control-lg border col-md-12" name="email" required placeholder="Enter the Email">
          </div>
          <div class="input-group mt-3">
           <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fa fa-lock"></i></span>
		    </div>
            <input type="password" class="form-control form-control-lg border col-md-12" name="pwd" required placeholder="Enter the Password">
          </div>
          <div class="form-group mt-5">
            <input type="submit" class="form-control-lg border col-md-12 bg-success text-white shadow" name="login" value="Login">
          </div>
          <a href="index.login.php?logid= 2" class="uppercase text-success"><small>I DO NOT HAVE AN ACCOUNT</small></a>
        </form>
      </div>
    </div>
  </div>
</section>



<?php
?>
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

		<section>
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-5 mt-5">
			<div class="form border  bg-white">
				<form class="form-defult p-3" method="POST" action="#">
					<h3 class="text-center"><i class="fa fa-pencil"></i> Signup</h3>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-user"></i></span>
					    </div>
					<input type="text" class="form-control form-control-lg" name="fname" required placeholder="Enter your Firstname">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-user"></i></span>
					    </div>
					<input type="text" class="form-control form-control-lg" name="lname" required placeholder="Enter your Laststname">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
					    </div>
					<input type="email" class="form-control form-control-lg" name="email" required placeholder="Enter the Email">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-user"></i></span>
					    </div>
					<input type="text" class="form-control form-control-lg" name="uname" required placeholder="Enter your Username">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-lock"></i></span>
					    </div>
						<input type="password" class="form-control form-control-lg" name="pwd" id="pwd1"  required placeholder="Enter the Password">
					</div>
					<div class="input-group mt-3">
						<div class="input-group-prepend">
					      <span class="input-group-text"><i class="fa fa-lock"></i></span>
					    </div>
						<input type="password" class="form-control form-control-lg" id="password" name="pwd2" onkeyup="validatePwd()" required placeholder="Confirm Password">
						<small id="pwd2" class="text-danger"></small>
					</div>
					<div class="input-group mt-3">
						<input type="submit" class="form-control-lg col-md-12 border bg-success text-white"  name="signup" value="Signup">
					</div>
					 <a href="index.login.php?logid= 1" class="uppercase text-success"><small>I HAVE AN ACCOUNT</small></a>
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
		<div class="left-done col-md-5 my-5">
			<div>
				<div class="border pb-5 bg-white">
					<h3 class="text-center mt-5 pt-5"><i class="fa fa-users"></i> Connect with Social Links</h3>
					<div class="ml-5 pl-5 mt-5">
						<a href="#" class="text-white btn btn-success col-md-10"><i class="fa fa-facebook-official text-white fa-2x"></i> Facebook</a>
					</div>
					<div class="ml-5 pl-5 mt-5">
						<a href="#" class="text-white btn btn-dark col-md-10"><i class="fa fa-google fa-2x "></i> Google Account</a>
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