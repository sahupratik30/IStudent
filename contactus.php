<?php
    include 'config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql ="INSERT INTO contactus(`name`, `email`, `message`, `dt`) VALUES (' $name',
      ' $email', '$message', current_timestamp());";
    if ($connection->query($sql)==true){
      ?>
  		<script>
      		alert("Your message has been received");
          location.replace("index.php");
      	</script>
      <?php
  }
    else{
      echo "ERROR:$sql <br> $connection->error";
    }
mysqli_close($connection);

?>