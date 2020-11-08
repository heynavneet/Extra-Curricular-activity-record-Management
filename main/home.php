<?php 
session_start();
include './init/functions.php';
if (check_session() == False) {
	header('location: index.php');
}
$username = get_username($_SESSION['admin_id']);
$admin_role = admin_role($_SESSION['admin_id']);


// page title
$title = "Admin - Home Page";
include 'inc/header.php';
 ?>

   

<section>
	<?php include 'inc/sidebar.php'; ?>
    
		<div class="main-content">
			
			<!-- profile header section included -->
			<?php include 'inc/profile.php'; ?>


			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa"><img style="width: 66px;height: 70px;" src="public/assets/icon/event.png" alt=""></i>
								
								<div style="padding-top: 40px;" class="stats">
								  <div class="grow">
									<p><a style="color: white;" href="view_activities.php">Activities</a></p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i style="color: #8BC34A;" class="fa fa-calendar-plus-o"></i>
								<div class="stats">
								  <h5> </h5>
								  <div class="grow">
									<p><a style="color: white;" href="add_activity.php">Add Activity</a></p>
								  </div>
								</div>
							</div>
						</div>

						<div class="clearfix"> </div>
					</div>



				</div>
			</div>
		</div>
			<footer>
			   <p>© 2020 Extra Curricular activity record Management System</p>
			</footer>

   </section>
  


<?php include 'inc/footer.php'; ?>
