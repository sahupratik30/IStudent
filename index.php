<?php
	include 'login.php';
	if (!empty($_SESSION['login_user'])){
		header("location: index.html");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<title>IStudent</title>
		<style>
			:root{
				--main-color: #0ebc7f;
			}
			.modal-header button:focus{
				outline: none!important;
			}
			.modal-header button:hover{
				color: var(--main-color)!important;
			}
			.modal-body form #email{
				border: none;
				border-bottom: 2px solid var(--main-color);
				border-radius: 0px;
				margin-bottom: 30px;
				width: 90%;
				margin-left: 50%;
				transform: translateX(-50%);
			}
			.modal-body form #password{
				border: none;
				border-bottom: 2px solid var(--main-color);
				border-radius: 0px;
				margin-bottom: 30px;
				width: 90%;
				margin-left: 50%;
				transform: translateX(-50%);
			}
			.modal-body form input:focus{
				border: none!important;
				box-shadow: none!important;
				border-bottom: 2px solid var(--main-color)!important;
			}
			.modal-body form .forgot{
				margin-left: 50%;
				transform: translateX(-50%);
				width: 80%;
			}
			.modal-body form a{
				text-decoration: none;
				color: #1785E7FF;
			}
			.modal-body form a:hover{
								color: black;
			}
			.modal-body form .btn_div{
				margin-left: 50%;
				margin-top: 30px;
				transform: translateX(-50%);
				display: flex;
				justify-content: center;
			}
			.modal-body form .btn_div button:focus{
				border: none!important;
				box-shadow: none!important;
			}
			.modal-body form .btn_div button:hover{
				background-color: #555;
			}
			.modal-body .ul-list{
				list-style-type: none;
			}
			.modal-body .ul-list li:first-child{
				margin-left: 60%;
				transform: translateX(-50%);
				width: 90%;
			}
			.modal-body .ul-list li input{
				border-radius: 0px!important;
				border: none!important;
				border-bottom: 2px solid var(--main-color)!important;
				margin-bottom: 25px;
			}
			.modal-body .ul-list li input:focus{
				border: none!important;
				box-shadow: none!important;
				border-radius: 0px!important;
				border-bottom: 2px solid var(--main-color)!important;
			}
			.modal-body .ul-list li label{
				margin-left: 53%;
				transform: translateX(-50%);
				width: 100%;
				color: var(--main-color);
			}
			.modal-body .ul-list li input[type=submit]{
				border: none!important;
				background-color: var(--main-color)!important;
				color: white!important;
				border-radius: 4px!important;
				margin-top: 30px!important;
			}
			.modal-body .ul-list li input[type=submit]:hover{
				background-color: #555!important;
			}
			.modal-body .ul-list li:last-child{
				width: 100%!important;
				display: flex;
				justify-content: center;
				margin-bottom: -30px!important;
			}
		</style>
	</head>
	<body>
		<header>
			<nav>
				<div class="logo">
					<a href="#"><img src="images/logo.png" alt="logo"></a>
				</div>
				<div class="navigation">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#aboutus">About</a></li>
						<li><a href="#contactus">Contact</a></li>
						<li>
							<div class="dropdown show">
								<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Courses
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="#">Programming Language</a>
									<a class="dropdown-item" href="#">Web Developement</a>
									<a class="dropdown-item" href="#">Android Developement</a>
									<a class="dropdown-item" href="#">Artificial Intelligence</a>
									<a class="dropdown-item" href="#">Machine Learning</a>

								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="login_register">
					<a href="#" data-toggle="modal" data-target="#signin">Login</a>
					<a href="" data-toggle="modal" data-target="#signup">Register</a>
				</div>
			</nav>
			<!-- Modal -->
			<div class="modal fade" id="signin">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-center">
							<h5 class="modal-title w-100 font-weight-bold" id="exampleModalLongTitle" style="color: var(--main-color);">Sign In</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body mx-4">
							<form action="login.php" method="POST">
								<div class="md-form">
									<input type="email" class="form-control validate" name="log_email" id="email" placeholder="Enter your email" required="required">
								</div>
								<div class="md-form">
									<input type="password" class="form-control validate" name="log_passwd" id="password" placeholder="Enter your password" required="required">
								</div>
								<div class="forgot">
									<a href="#">Forgot Password?</a>
								</div>
								<div class="btn_div">
									<button type="submit" class="btn btn-success">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade mt-5" id="signup">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-center">
							<h5 class="modal-title w-100 font-weight-bold" id="exampleModalLongTitle" style="color: var(--main-color);">Register</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body mx-4">
							<form action="signup.php" method="POST">
								<ul class="ul-list">
									<li>
										<input type="radio" id="student" name="check-type" onchange="check_type()" value="student" checked> Student&emsp;
										<input type="radio" id="inst" name="check-type" value="institute" onchange="check_type()"> Institute&emsp;
										<input type="radio" id="comp" name="check-type" value="company" onchange="check_type()"> Company
									</li>
									<li>
										<input type="text" required pattern="^[a-zA-Z ]+$" class="input form-control" id="reg_name" name="reg_name" maxlength="32" placeholder="Student Name"/>
									</li>
									<li>
										<input type="text" required class="input form-control" id="reg_uname" name="reg_uname" pattern="^[a-z\d\.]{5,}$" placeholder="User Name" onchange="check_user()"/>
									</li>
									<li>
										<input type="number" required class="input form-control" id="mobile" name="contact_no" placeholder="Mobile No."/>
									</li>
									<li>
										<input type="email" required class="input form-control" id="reg_email" name="reg_email" placeholder="Email Address"/>
									</li>
									<li>
										<input type="password" required class="input form-control" id="reg_passwd" name="reg_passwd" placeholder="Password"/>
									</li>
									<li>
										<input type="password" required="" class="input form-control" id="c_password" name="c_password" placeholder="Confirm Password"/>
									</li>
									<li>
										<label>By signing up, you agree to our Terms of Service</label>
									</li>
									<li>
										<input type="submit" id="signup-btn" value="Sign up" class="btn">
									</li>
								</ul>
								<script type="text/javascript">
									function check_type(){
										if ($("#student").is(":checked")){
											$("input#reg_name").prop("placeholder","Student Name");
											$("input#reg_name span i").text("account_box");
										}
										else if ($("#inst").is(":checked")){
											$("input#reg_name").prop("placeholder","Institute Name");
												$("input#reg_name span i").text("account_balance");
										}
										else{
											$("input#reg_name").prop("placeholder","Company Name");
											$("input#reg_name span i").text("business_center");
										}
									}
								</script>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="stud_logo">
					<img src="images/img1.png" alt="">
				</div>
				<div class="main_text">
					<marquee id="text-heading" direction="left" scrollamount="20">Welcome To Our Community</marquee><br>
					<p id="text-context">iStudent is a platform where companies can find the internees,<br>employees, workers for them. It provides the educational documents,<br> certificates, curriculum vitae (CV) of the users. </p>
					<a id="readmore" href="#aboutus">Read More</a>
				</div>
			</div>
		</header>
		<section id="join_section">
			<div class="register">
				<a href="#" data-toggle="modal" data-target="#signup">Sign Up Now</a>
			</div>
			<div class="join">
				<p>Join the iStudent - Be a part of the growing community.</p>
			</div>
		</section>
		<section id="aboutus">
			<div class="about_heading">
				<p id="title">Everything you need to know about us</p>
				<hr class="style-1" style="width: 600px; align-self: center;"><br/>
			</div>
			<div class="slider">
				<div class="slide">
					<div class="slide_img">
						<img src="images/we.png" alt="">
					</div>
					<div class="slide_content">
						<h1>WHO ARE <span>WE</span></h1>
						<p>We are a group of highly motivated students and we are trying to solve the daily life problems of students which hinder them to be successful in their lives. </p>
					</div>
				</div>
				<div class="slide">
					<div class="slide_img">
						<img src="images/mission.png" alt="">
					</div>
					<div class="slide_content">
						<h1>OUR <span>MISSION</span></h1>
						<p>We aim to promote the digital document attestation and verification. Our sole mission is to save the time that the students consume in attesting their docs.</p>
					</div>
				</div>
				<div class="slide">
					<div class="slide_img">
						<img src="images/provide.png" alt="">
					</div>
					<div class="slide_content">
						<h1>WHAT WE <span>PROVIDE</span></h1>
						<p>iStudent is a platform where students can get their documents verified and attested digitally. Companies can view their docs and offer them internships and jobs.</p>
					</div>
				</div>
			</div>
			<div class="slider-dots"></div>
		</section>
		<section id="contactus">
			<div class="contact_form">
				<h1>Contact Us</h1>
				<hr>
				<p>Please feel free to contact us with any questions you may have: at the very least, we can help you get on the right path to get started.</p>
				<form action="contactus.php" method="POST">
					<div class="name">
						<input type="text" name="name" id="name" placeholder="Enter your name" required>
					</div>
					<div class="email">
						<input type="email" name="email" id="email" placeholder="Enter your email" required>
					</div>
					<div class="message">
						<textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
					</div>
					<button type="submit" value="Send">Send</button>
				</form>
			</div>
		</section>
		<footer>
			<div class="logo_img">
				<a href="#"><img src="images/logo.png" alt="" id="image"></a>
			</div>
			<div class="copyright">
				<p>iStudent &copy;  2021. All rights reserved.</p>
			</div>
			<div class="contact_details">
				<h3>Contact Details</h3>
				<hr>
				<label>Phone: +91-123-456-7899</label><br>
				<label>E-mail: contact@istudent.com</label>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="js/app1.js"></script>
	</body>
</html>