<?php
	include 'config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$full_name = $_POST['reg_name'];
		$user_name = $_POST['reg_uname'];
		$contact_no = $_POST['contact_no'];
		$email_id = $_POST['reg_email'];
		$password = $_POST['reg_passwd'];
		$user_type = $_POST['check-type'];
		$emailquery="select * from user where email_id='$email_id'";
		$query=mysqli_query($connection,$emailquery);
		$emailcount=mysqli_num_rows($query);
		if ($emailcount>0) {
?>
  		<script>
      		alert("Email already exists! Try using another email.");
		    location.replace("index.html");
      	</script>
<?php
		}
		else{
			echo $query = "INSERT INTO user(name,user_name,email_id,password, contact_no, user_type) VALUES('$full_name','$user_name','$email_id','$password','$contact_no','$user_type')";
	   		echo $table = mysqli_query($connection,$query);
			if($table){
				$_SESSION['login_user']= $_POST['reg_uname']; 
				header("location: index.php"); // Redirecting To Other Page
			exit();
			}
			mysqli_close($connection); // Closing Connection
		}
	}
?>