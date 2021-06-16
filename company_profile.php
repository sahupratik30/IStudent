<?php
	error_reporting(0);
	include 'config.php';
	session_start();
	if (empty($_SESSION['login_user'])){
		header("location: index.php");
		exit();
	}
	
	if (is_numeric($_GET['user'])){
		$query = "select name,email_id,contact_no,img_url,user_type from user where id=".$_GET['user'];
	}
	else{
		$query = "select name,email_id,contact_no,img_url,user_type from user where name='".$_GET['user']."'";
	}
	$table = mysqli_query($connection,$query);
		if($table){
			$rows=mysqli_num_rows($table);
			if($rows == 1){
			$row = mysqli_fetch_assoc($table);
			$dp = $row['img_url'];
			$fullname = $row['name'];
			$email = $row['email_id'];
			$contact = $row['contact_no'];
		}
			}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Profile</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Maitree|Ropa+Sans" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/style1.css"> <!-- Resource style -->
		<link rel="stylesheet" href="css/media.css">
		<link rel="stylesheet" href="css/profile.css">
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
	</head>
	<body onload="check()">
		<script type="text/javascript">
			function check(){
				$("span#msgcount").load("msg-counter.php");
			}
			function suggestions(){
				var input = $(".search").val();
				var url = "users.php?keyword="+input;
				$("datalist#searches").load(url);
			}
			function searched(){
				var name = $(".search").val();
				window.open("profile.php?user="+name,'_self');
			}
		</script>
		<header class="cd-main-header">
			<a href="company_profile.php?user=<?php echo $_SESSION['login_user'];?>" class="cd-logo"><img src="images/logo.png" alt="Logo"></a>
			
			<div class="cd-search is-hidden">
				<input list="searches" class="search" placeholder="Search..." onkeyup="suggestions()" onchange="searched()">
				<datalist id="searches">
				</datalist>
				</div> <!-- cd-search -->
				<a href="#" class="cd-nav-trigger">Menu<span></span></a>
				<nav class="cd-nav">
					<ul class="cd-top-nav">
						<!--<li><a href="#">Privacy Policy</a></li>-->
						<li class="has-children account">
							<a href="#">
								<img src="<?php echo $_SESSION['dp_url'];?>">
								Account
							</a>
							<ul>
								<li><a href="c_settings.php">Edit Account</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				</header> <!-- .cd-main-header -->
				<main class="cd-main-content">
					<nav class="cd-side-nav">
						<ul>
							<li class="nav-dp"><a class="dp"><img src="<?php echo $_COOKIE['dp_url'];?>"></a></li>
							<li class="nav-name"><h1>@<?php echo $_COOKIE['user_name'];?></h1></li>
							<li class="cd-label">Main</li>
							<li class="profile active">
								<a href="company_profile.php?user=<?php echo $_SESSION['login_user'];?>">Profile</a>
							</li>
						</ul>
						<ul>
							<li class="cd-label">Secondary</li>
							
							<li class="jobs">
								<a href="job_form.php">Post a job</a>
							</li>
							<li class="settings">
								<a href="c_settings.php">Settings</a>
							</li>
						</ul>
						<ul>
							<li class="cd-label">Action</li>
							<li class="action-btn"><a href="#">Report Bug</a></li>
						</ul><br/><br/>
						<ul>
							<center>
							<iframe width="135px" height="60px" scrolling="no" src="clock.html"></iframe>
							</center>
						</ul>
					</nav>
					<div class="content-wrapper">
						<div class="profile-container">
							<div class="info-box">
								<img id="pro-timeline" src="images/pro-timeline.jpg"></img>
								<div class="pro-title">
									<center>
										<img class="profile-image" src="<?php echo $dp; ?>">
										<p id="pro-name"><?php echo $fullname; ?></p>
										<span class="pro-detail"><?php echo $email; ?></span> |
										<span class="pro-detail" id="number"><?php echo $contact; ?></span><br/><br/>
										<form action="add-contact.php">
											<input value="<?php echo $_GET['user'];?>" id="user" name="user" hidden>
											<button type="submit" style="padding: 10px;" id="add-contact" name="add-contact" value="0">Add to 	Contact List
											</button>
										</form>
									</center>
								</div>
							</div>
							</div> <!-- profile-container -->
							</div> <!-- .content-wrapper -->
							</main> <!-- .cd-main-content -->
							<script src="js/jquery.js"></script>
							<script src="js/jquery.menu-aim.js"></script>
							<script src="js/profile.js"></script> <!-- Resource jQuery -->
							<script>
							$(document).ready(function(){
								$("button#add-contact").hide();
							<?php
								if ($_GET['user'] != $_SESSION['login_user']){
									$_SESSION['added'] = 0;
							?>
							$(".remove").hide();
							$("button#add-contact").show();
							<?php
									$query = "select * from contact where user_id =".$_SESSION['login_user'];
									$table = mysqli_query($connection,$query);
									if($table){
										$rows=mysqli_num_rows($table);
										if($rows > 0){
										for($x = 0; $x<= $row; $x++){
												$row = mysqli_fetch_assoc($table);
												if ($_GET['user'] == $row['contact_id']){
							?>
							$("button#add-contact").html("Added in Contact List");
							$("button#add-contact").val(1);
							$("button#add-contact").css({"background-color":"white","border":"1px solid #16b980", "color":"#16b980"});
							<?php
							$_SESSION['added'] = 1;
							break;
							}
							}
							}
							}
							}
							?>
							$("form#form-edu").hide();
							$("form#form-int").hide();
							$("form#form-ski").hide();
							$("button#cancel-edu").click(function(){
							$("form#form-edu").hide();
							});
							$("button#cancel-ski").click(function(){
							$("form#form-ski").hide();
							});
							$("button#cancel-int").click(function(){
							$("form#form-int").hide();
							});
							$("button#add-edu").click(function(){
							$("form#form-edu").toggle();
							});
							$("button#add-ski").click(function(){
							$("form#form-ski").toggle();
							});
							$("button#add-int").click(function(){
							$("form#form-int").toggle();
							});
							});
							</script>
						</body>
					</html>