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
				<h3 class="blank1">Activities</h3>
				<div class="tab-content">
					<div class="col_3">

						<?php 
							$user_id = get_user_id($_SESSION['admin_id']);
							$smtp = $con->prepare("SELECT * FROM `events` WHERE user_id=$user_id AND event_status=0");
							$smtp->execute();
							$events = $smtp->fetchAll();
							if ($events){
								
							foreach ($events as $event) {
							?>
							
							<div style="padding-bottom: 40px;" class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<p style="padding: 10px;"><b>Activity Title:</b>&nbsp&nbsp<?php echo $event['event_title']; ?></p>
									<p style="padding: 10px;"><b>Description:</b>&nbsp&nbsp<?php echo $event['event_description']; ?></p>
									<p style="padding: 10px;"><b>Date & Time:</b>&nbsp&nbsp<i><?php echo $event['event_date']."&nbsp & &nbsp".$event['event_time']; ?></i></p>

									<p style="padding: 10px;"><b>Location::</b>&nbsp&nbsp<?php echo $event['event_location']; ?></p>

									<p style="padding: 10px;"><b>Status::</b>&nbsp&nbsp<?php 
											$i =  $event['event_status']; 
											if ($i==0) {
												echo "In Process";
											}else {
												echo "Completed";
											}
									?></p>
								</div>
							</div>
							<?php } 
							}else{
							?>
							<h4>No activity added yet!</h4>
							<?php

							}
							?>
							
							<div class="clearfix"> </div>
						</div>
				
				</div>
		    </div>
	   </div>


</section>







<?php include 'inc/footer.php'; ?>	