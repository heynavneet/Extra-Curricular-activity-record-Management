<?php 
session_start();
include './init/functions.php';
if (check_session() == False) {
	header('location: index.php');
}

// page title
$title = "Create Event";
include 'inc/header.php';
include 'init/db.php';
 ?>
<section>
<?php include 'inc/sidebar.php'; ?>
	<div class="main-content">
 
		<!-- profile header section included -->
		<?php include 'inc/profile.php'; ?>
			
		<div id="page-wrapper">
			<div class="graphs">
				<h3 class="blank1">Users</h3>
				<div class="tab-content">
					<div class="col_3">

						<?php 
							$smtp = $con->prepare("SELECT * FROM `users` WHERE status=1");
							$smtp->execute();
							$users = $smtp->fetchAll();
							foreach ($users as $user) {
							?>
							
							<div style="padding-bottom: 40px;" class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<p style="padding: 10px;"><b>Username:</b>&nbsp&nbsp<?php echo $user['user_name']; ?></p>
									<p style="padding: 10px;"><b>Email:</b>&nbsp&nbsp<?php echo $user['user_mail']; ?></p>

								</div>
							</div>
							<?php } ?>
							
							<div class="clearfix"> </div>
						</div>
				
				</div>
		    </div>
	   </div>


</section>







<?php include 'inc/footer.php'; ?>	