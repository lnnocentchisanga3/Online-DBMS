<?php
if (isset($_POST['logout'])) {
	session_start();
	session_unset();
	session_destroy();

	header("location: ../index.php");
}


?>

<?php
if (isset($_POST['adminlogout'])) {
	session_start();
	session_unset();
	session_destroy();

	header("location: ../admin.php");
}


?>