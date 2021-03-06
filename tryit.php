<!DOCTYPE html>
<html>
<head>
	<title>online| DBMS</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.min.css">
</head>
<body class="bg-white" onload="myConfirm();">
	<?php
include_once "assets/header.php";
	?>


	<script>
		function myConfirm() {
			document.querySelector('.modal').style.display = "block";
			document.getElementById('close').addEventListener('click',function() {
				document.querySelector('.modal').style.display = "none";
			});
		}

		function myPin() {
			var x = document.getElementById('pwd').value;
			document.getElementById('answer').innerHTML = x;
			if (x == "9455@Dbms"){
				document.querySelector('.modal').style.display = "none";
			}else{
				document.getElementById('answer').innerHTML = x+" "+"is not a right Pin";
			}
		}
	</script>
	<div class="modal col-lg-12" id="modal">
		<div class="text-danger mt-3 mr-3" style="font-size: 3rem; float: right;" id="close"></div>
		<div class="modal-body col-lg-6 container" id="modal-body">
			<div class="modal-content bg-white col-lg-12 row">
				<div class="col-lg-12">
					<h5 class="text-danger text-center my-4">Enter the Pin to Continue <i class="fa fa-key"></i></h5>
				<input type="password" name="pwd" class="form-control mb-5" id="pwd" autofocus>
				<small class="text-danger py-4" id="answer"></small><br>
				<button class="btn btn-primary mb-5 mt-3" onclick="myPin();">Ok   </button>
				</div>
			</div>
		</div>
	</div>



<section class="welcome container col-lg-12 pt-5" >
	<div class="row">
		<div class="text-center text-white col-lg-12 pt-5">
			<h1 id="welcome">WELCOME</h1>
			<h1>to</h1>
			<h1 class="text-primary"> PERSONAL BDMS</h1>
		</div>
		<div class="col-lg-12 pt-5 container">
			<div class="row">
				<h5 class="col-lg-12 text-center pt-1 pb-5 text-white">Take Full control of your Data  by Keeping it in one place with Us.</h5>
			<div class="col-lg-3 text-white text-center pb-3"><a href="#" class="todo text-white"><i class="fa fa-file-text fa-5x"></i><br>
			Documents</a></div>
			<div class="col-lg-3 text-white text-center pb-3"><a href="#" class="todo text-white"><i class="fa fa-clipboard fa-5x"></i><br>To do list</a></div>
			<div class="col-lg-3 text-white text-center pb-3"><a href="#" class="todo text-white"><i class="fa fa-file-sound-o fa-5x"></i><br> Music Files</a></div>
			<div class="col-lg-3 text-white text-center pb-3"><a href="#" class="todo text-white"><i class="fa fa-wrench fa-5x"></i><br>Dairy Tools</a></div>
			</div>
		</div>
	</div>
</section>














<?php
include_once "assets/footer.php"

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