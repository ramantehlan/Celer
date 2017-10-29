<?php
/*
This is to get the required page according to the demand 

Author: Raman Tehlan
Date of creation:14/10/2017
*/

	if(isset($_GET['page'])){
		$page_file = $_GET['page'];
		$page_name = "Unknown";
		$user_type = substr($page_file, 0 , 1);

		switch ($page_file) {
			case 'b_dashboard':
				$page_file = "b_dashboard.php";
				$page_name = "Business Dashboard";
				break;
			case 'b_upload':
				$page_file = "b_upload.php";
				$page_name = "Upload";
				break;
			case 'a_dashboard':
				$page_file = "a_dashboard.php";
				$page_name = "API Dashboard";
				break;
			
			default:
				header("Location:index.php");
				break;
		}

		switch ($user_type) {
			case 'a':
					$user_type = "API user";
				break;
			case  'b':
					$user_type = "Business user";
				break;
			default:
					header("Location:index.php");
				break;
		}

		
	}else{
		header("Location:index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Celer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/css/comman-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/css/leftmenu-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">

	<script type="text/javascript" src='assets/javascript/jquery.js'></script>
	<script type="text/javascript" src='assets/javascript/jquery-ui.js'></script>
	<script type="text/javascript" src="assets/javascript/chart.js"></script>
	<script type="text/javascript" src="assets/javascript/tooltip.js"></script>
	<script type="text/javascript" src="assets/javascript/open_effects.js"></script>

</head>
<body>

<div class='topbar_frame <?php if($user_type == "API user"){echo "api_top";} ?>'>

	
        <div class='page_name'>
         	<?php echo $page_name; ?>
        </div>
   

   	<div class='subscription_alert'>
			<?php echo $user_type; ?>
	</div>

</div>

<div class="leftmenu">

	<div class='left_logo'>
			 <img src="assets/images/icon_64_white.png">
	</div>
	<div class="leftmenu_body">

	<?php 
			if($user_type == "Business user"){
	?>
		<a href='?page=b_dashboard'>
 		<div class="leftmenu_row tooltip_object <?php if($page_file == "b_dashboard.php"){echo "leftmenu_row_selected";} ?>" >
				
				<div class='leftmenu_row_icon'>
						<img src="assets/images/app_dashboard2.png">
				</div>
				
				<div class="tooltip_box menu_tooltip_box">
						Business Dashboard
				</div>
		</div>
		</a>

		<a href='?page=b_upload'>
 		<div class="leftmenu_row tooltip_object <?php if($page_file == "b_upload.php"){echo "leftmenu_row_selected";} ?>">
				
				<div class='leftmenu_row_icon'>
						<img src="assets/images/export_white.png">
				</div>
				
				<div class="tooltip_box menu_tooltip_box">
						Upload 
				</div>
		</div>
		</a>

	<?php 
			}else{
	?>
		<a href='?page=a_dashboard'>
 		<div class="leftmenu_row tooltip_object <?php if($page_file == "a_dashboard.php"){echo "leftmenu_row_selected";} ?>" >
				
				<div class='leftmenu_row_icon'>
						<img src="assets/images/app_dashboard2.png">
				</div>
				
				<div class="tooltip_box menu_tooltip_box">
						API Dashboard
				</div>
		</div>
		</a>
	<?php
			}
	?>

		<a href='index.php'>
 		<div class="leftmenu_row tooltip_object">
				
				<div class='leftmenu_row_icon'>
						<img src="assets/images/logout.png">
				</div>                                                                                            
				
				<div class="tooltip_box menu_tooltip_box">
						Logout
				</div>
		</div>
		</a>
	


	</div>

</div>

<div class='body'>
<?php
	
	include $page_file;

?>
</div>

</body>
</html>