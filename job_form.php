<?php
	include 'login.php';
	if (empty($_SESSION['login_user'])){
		header("location: index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Job</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/style1.css"> <!-- Resource style -->
		<link rel="stylesheet" href="css/media.css">
		<link rel="stylesheet" href="css/jobs.css">
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<style>
			:root{
				--main-color: #0ebc7f;
			}
			a:hover{
				text-decoration: none;
			}
			main{
				position: relative;
				display: flex;
				align-items: center;
			}
			.content-wrapper{
				position: absolute;
				margin-top: 4%;
				left: 40%;
				transform: translateX(-50%);
				display: flex;
				justify-content: center;
				width: 700px;
				height: 500px;
			}
			.jobform{
				width: 90%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				box-shadow: 2px 2px 8px #555;
			}
			.jobform .form-group{
				margin-bottom: 20px;
			}
			.jobform .form-group label{
				margin-bottom: 15px;
			}
			.jobform input{
				width: 500px;
				height: 30px;
				border: none!important;
				background: transparent;
				border-radius: 0px!important;
				border-bottom: 2px solid var(--main-color)!important;
				font-size: 14px;
			}
			.jobform input:focus{
				border: none!important;
				outline: none!important;
				box-shadow: none!important;
				background: transparent;
				border-bottom: 2px solid var(--main-color)!important;
			}
			.jobform input::placeholder{
				font-size: 14px;
			}
			.jobform button{
				margin-left: 50%;
				transform: translateX(-50%);
				width: 20%;
				height: 35px;
				font-size: 15px;
				background-color: var(--main-color);
				border: none;
			}
			.jobform button:hover{
				background-color: #555;
				transition: 0.3s ease;
			}
			.jobform button:focus{
				outline: none;
			}
		</style>
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
			<a href="profile.php" class="cd-logo"><img src="images/logo.png" alt="Logo"></a>
			<div class="cd-search is-hidden">
				<input list="searches" class="search" placeholder="Search..." onkeyup="suggestions()" onchange="searched()">
				<datalist id="searches"></datalist>
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
							<li class="nav-dp"><a class="dp"><img src="<?php echo $_SESSION['dp_url'];?>"></a></li>
							<li class="nav-name"><h1>@<?php echo $_SESSION['user_name'];?></h1></li>
							<li class="cd-label">Main</li>
							<li class="profile">
								<a href="company_profile.php?user=<?php echo $_SESSION['login_user'];?>">Profile</a>
							</li>
						</ul>
						<ul>
							<li class="cd-label">Secondary</li>
							
							<li class="jobs active">
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
						<div class="jobform">
							<form action="post_job.php" method="POST">
								<div class="form-group">
									<input type="text" class="form-control" name="cname" id="cname" placeholder="Company name" required="">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="jobtitle" id="job" placeholder="Job Title" required="">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="branch" id="branch" placeholder="Eligible Branch" required="">
								</div>
								<div class="form-group">
									<input type="number" class="form-control" name="cgpa" id="cgpa" placeholder="Minimum CGPA" required="">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="skills" id="skills" placeholder="Skills required" required="">
								</div>
								<div class="form-group">
									<label for="date">Last Date To Apply :-</label>
									<input type="date" class="form-control" name="lastdate" id="date" placeholder="Last date to apply" required="">
								</div>
								<button type="submit" class="btn btn-primary">Post</button>
							</form>
						</div>
					</div>
					</main> <!-- .cd-main-content -->
					<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					<script src="js/jquery.js"></script>
					<script src="js/jquery.menu-aim.js"></script>
					<script src="js/profile.js"></script> <!-- Resource jQuery -->
				</body>
			</html>