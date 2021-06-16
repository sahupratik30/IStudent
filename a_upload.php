<?php 
	include 'config.php';
	$sql = "SELECT * FROM assignments";
	$result = mysqli_query($connection,$sql);
	$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if (isset($_POST['submit'])) {
		$aname = $_POST['aname'];
		$lastdate = $_POST['lastdate'];
		$filename = $_FILES['myfile']['name'];
		$destination = 'assignments/' . $filename;
		$extension = pathinfo($filename,PATHINFO_EXTENSION);
		$file = $_FILES['myfile']['tmp_name'];
		$size = $_FILES['myfile']['size'];
		if (!in_array($extension,['zip','pdf','png','jpg'])) {
		?>
  			<script>
      			alert("Your file extension must be .zip, .pdf, .png or .jpg");
          		location.replace("assignment_form.php");
      		</script>
     	 <?php
		}
		elseif ($_FILES['myfile']['size'] > 1000000) {
		?>
  			<script>
      			alert("Your file is too large");
          		location.replace("assignment_form.php");
      		</script>
     	 <?php	
		}
		else {
			if (move_uploaded_file($file, $destination)) {
				$sql = "INSERT INTO assignments (aname,last_date) VALUES('$aname','$lastdate')";
				if(mysqli_query($connection,$sql)) {
					?>
  						<script>
      						alert("File uploaded successfully");
      					</script>
     	 			<?php
     	 			$query = "SELECT * FROM user WHERE user_type='student'";
		        	$query_run = mysqli_query($connection,$query);
		        	if(mysqli_num_rows($query_run) > 0)
		        	{
            			while ($row1 = mysqli_fetch_assoc($query_run)) 
            			{
                  			$select_query = "SELECT * FROM assignments";
                  			$select_query_run = mysqli_query($connection,$select_query);
                  			if(mysqli_num_rows($select_query_run) > 0)
                  			{
                      			while ($row = mysqli_fetch_assoc($select_query_run)) 
                      			{
                          			$aname = $row['aname'];
                          			$ldate = $row['last_date'];
                          			$to=$row1['email_id'];
                          			$subject="Assignment Given";
                          			$body="Assignment Name: $aname\nLast date to submit: $ldate";
                         			$headers = "From: istudent2021@gmail.com" . "\r\n" .
                                    			"BCC: somebodyelse@example.com";
                         			mail($to, $subject, $body, $headers);
                      			}
                  			}
              			}
                    ?>
                      <script>
                        location.replace('assignment_form.php');
                      </script>
                    <?php

            }
				}
				else {
					?>
  						<script>
      						alert("File upload failed");
          					location.replace("assignment_form.php");
      					</script>
     	 			<?php					
				}
			}
		}
	}

if (isset($_GET['file_id'])) {
	$id = $_GET['file_id'];
	$sql = "SELECT * FROM assignments WHERE id=$id";
	$result = mysqli_query($connection,$sql);
	$file = mysqli_fetch_assoc($result);
	$filepath = 'assignments/' . $file['name'];
	if(file_exists($filepath)) {
		header('Content-Type: application/octet-stream');
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename=' . basename($filepath));
		header('Expires: 0');
		header('Cache-Control: must revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize('assignments/' . $file['name']));
		readfile('assignments/' . $file['name']);
		exit;
	}
}





 ?>


