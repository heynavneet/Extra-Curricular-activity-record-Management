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

		<!-- create new Event -->
		<?php 
			$msg = "";
			if (isset($_POST) & !empty($_POST)) {
		        $title = $_POST['event_title'];
		        $discription = filter_var($_POST['descri'],FILTER_SANITIZE_STRING);
		        $date  = $_POST['event_date'];
		        $time  = $_POST['event_time'];
		        $location  = filter_var($_POST['event_location'],FILTER_SANITIZE_STRING);
		        $user_id = get_user_id($_SESSION['admin_id']);
		        $create = new_event($title,$discription,$date,$time,$location,$user_id);
		        $msg = $create;
		    }
		 ?>
		<!--  -->
		<div id="page-wrapper">
			<div class="graphs">
				<h3 class="blank1">Add Activity</h3>
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="#" method="post">
							<!--  -->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Activity Title <b style="color: red;">*</b></label>
							<div class="col-sm-6">
								<input type="text" name="event_title" class="form-control1" id="focusedinput" placeholder="Activity Title" required="">
							</div>
							</div>
							<!--  -->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Activity Description <b style="color: red;">*</b></label>
							<div class="col-sm-6">
									<textarea name="descri" id="txtarea1" cols="40" rows="4" class="form-control1" placeholder="Activity Description ...." required=""></textarea>
							</div>
							</div>
							<!--  -->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Date <b style="color: red;">*</b></label>
								<div class="col-sm-2">
										<input type="date" name="event_date" min="" required="">
								</div>
								<!--  -->
								<label for="focusedinput" class="col-sm-1 control-label">Time <b style="color: red;">*</b></label>
								<div class="col-sm-3">
										<div style="margin:0 0 0 0;" class="input-group clockpicker">
										    <input type="text" name="event_time" class="form-control" required="">
										    <span class="input-group-addon">
										        <span class="glyphicon glyphicon-time"></span>
										    </span>
										</div>
								</div>
							</div>
							<!--  -->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Location <b style="color: red;">*</b></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="event_location" placeholder="Enter a location" required="" />  
								</div>
							</div>

							<!-- Activy Notification -->
								<div class="col-sm-6">
									<p><?php if($msg){ echo $msg;} ?></p>
								</div>
							<!--  -->
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" class="btn-success btn">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>


	</div>


</section>
<script src="./public/assets/js/clockpicker.js"></script>
<script>
$('.clockpicker').clockpicker();
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("event_date")[0].setAttribute('min', today);


</script>






<?php include 'inc/footer.php'; ?>	