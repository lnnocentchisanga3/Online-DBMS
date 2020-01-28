<div class="row">
	<?php

	include 'connect.php';
    include '../assets/db.php';
	$query_topic = mysqli_query($mycon, "SELECT count(name) as id from file where status='1' ");
	$query_images = mysqli_query($mycon, "SELECT count(folder) as id from file where folder='images' and status='1'");
	$query_apks = mysqli_query($mycon, "SELECT count(folder) as id from file where folder='apks' and status='1'");
	$query_videos = mysqli_query($mycon, "SELECT count(folder) as id from file where folder='videos' and status='1'");
	$query_docs = mysqli_query($mycon, "SELECT count(folder) as id from file where folder='docs' and status='1'");
	$query_trash = mysqli_query($mycon, "SELECT count(*) as id from file where status='0' ");
	$query_musics = mysqli_query($mycon, "SELECT count(folder) as id from file  where folder='musics' and status='1'");

	$row = mysqli_fetch_array($query_topic);
	$row_apks = mysqli_fetch_array($query_apks);
	$row_docs = mysqli_fetch_array($query_docs);
	$row_images = mysqli_fetch_array($query_images);
	$row_music = mysqli_fetch_array($query_musics);
	$row_trash = mysqli_fetch_array($query_trash);
	$row_video = mysqli_fetch_array($query_videos);

	?>
	<div class="col-lg-12">
		<div class="row">

					<div class="col-lg-3 col-xs-12">
						<div class="card p-0">
							<div class="stat-widget-three">
								<div class="stat-icon bg-primary p-48">
									<i class="ti-folder"></i>
								</div>
								<div class="stat-content p-30">
									<div class="stat-text">Total Folder</div>




									<div class="stat-digit"><?php echo $row['id']; ?></div>


								</div>
							</div>

						</div>




					</div>

					<div class="col-lg-3 col-xs-12">
						<a href="music.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-info p-48">
										<i class="ti-music"></i>
									</div>
									<div class="stat-content p-30">
										<div class="stat-text"> Music</div>

										<div class="stat-digit"><?php echo $row_music['id']; ?></div>
						</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-xs-12">
						<a href="images.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-dark p-48">
										<i class="ti-image"></i>
									</div>
									<div class="stat-content p-30">
										<div class="stat-text"> Images</div>
										<div class="stat-digit"><?php echo $row_images['id']; ?></div>
						</a>
									</div>
								</div>
							</div>
					</div>

					<div class="col-lg-3 col-xs-12">
						<a href="videos.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-danger p-48">
										<i class="ti-video-camera"></i>
									</div>
									<div class="stat-content p-30">
										<div class="stat-text"> Videos</div>

										<div class="stat-digit"><?php echo $row_video['id']; ?></div>
						</a>
								</div>
							</div>
						</div>
					</div>


					<div class="col-lg-3 col-xs-12">
						<a href="file.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-success p-48">
										<i class="ti-file"></i>

									</div>
									<div class="stat-content p-30">
										<div class="stat-text">Docs</div>

										<div class="stat-digit">
											<?php echo $row_docs['id']; ?>
										</div>
						</a>
									</div>	
								</div>
							</div>
					</div>

					<div class="col-lg-3 col-xs-12">
						<a href="apk.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-warning p-48">
										<i class="ti-android"></i>
									</div>
									<div class="stat-content p-30">
										<div class="stat-text"> Apks</div>

										<div class="stat-digit"><?php echo $row_apks['id']; ?></div>
						</a>
									</div>
								</div>
						</div>
					</div>

					<div class="col-lg-3 col-xs-12">
						<a href="trash.php">
							<div class="card p-0">
								<div class="stat-widget-three">
									<div class="stat-icon bg-warning p-48">
										<i class="ti-trash"></i>
									</div>
									<div class="stat-content p-30">
										<div class="stat-text"> Trash</div>

										<div class="stat-digit"><?php echo $row_trash['id']; ?></div>
						</a>
							</div>
									</div>
							</div>
					</div>
		</div>


	</div>
</div>