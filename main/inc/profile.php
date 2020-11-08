<?php 
	$username = get_username($_SESSION['admin_id']);
	$admin_role = admin_role($_SESSION['admin_id']);
 ?>
<div class="header-section">
			 
<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>

<div class="menu-right">
	<div class="user-panel-top">  	

		<div class="profile_details">		
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">	
							<span style="background:url(images/1.jpg) no-repeat center"> </span> 
							 <div class="user-name">
								<p><?php echo $username; ?><span></span></p>
							 </div>
							 <i class="lnr lnr-chevron-down"></i>
							 <i class="lnr lnr-chevron-up"></i>
							<div class="clearfix"></div>	
						</div>	
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
					</ul>
				</li>
				<div class="clearfix"> </div>
			</ul>
		</div>		

		<div class="clearfix"></div>
	</div>
  </div>
</div>