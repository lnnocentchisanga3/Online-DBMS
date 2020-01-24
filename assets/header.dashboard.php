<header class="fluid-container bg-white shadow-lg fixed-top">
		<div class="row">

			<div class="col-md-7  ml-1 text-dark pt-2">
				<h3 class="brand"><i class="fa fa-database text-danger"></i> Personal Storage</h3>
			</div>
			<div class="col-md-4 py-2">
			
				<div class="">
					 <div class="dropdown">
					  <button class=" btn btn-light shadow-lg dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user-circle-o"></i><span><?php echo "  ".$_SESSION['fname']." ".$_SESSION['lname']?>
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					   <li class="nav-item">
					      <form action="assets/logout.php" method="POST" class="p-5">
					      <button name="logout" class="btn btn-danger shadow-lg rounded">Logout     <i class="fa fa-sign-out"></i></button>
					    </form>
					  </li>
					  </ul>
					</div>
				</div>
			</div>
		</div>
	</header>