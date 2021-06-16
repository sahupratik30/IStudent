<?php
    include 'config.php';
    $cname = $_POST['cname'];
    $jobtitle = $_POST['jobtitle'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
    $skills = $_POST['skills'];
    $lastdate = $_POST['lastdate'];
    $sql ="INSERT INTO posted_jobs(`company_name`,`job_title`, `branch`, `cgpa`, `skills`, `last_date`) VALUES ('$cname', '$jobtitle',
      ' $branch', '$cgpa', '$skills', '$lastdate');";
    if ($connection->query($sql)==true){
      ?>
  		<script>
      		alert("Job was posted successfully");
      	</script>
      <?php
        $query = "SELECT * FROM user WHERE user_type='student'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run) > 0)
        {
            while ($row1 = mysqli_fetch_assoc($query_run)) 
            {
                  $select_query = "SELECT * FROM posted_jobs";
                  $select_query_run = mysqli_query($connection,$select_query);
                  if(mysqli_num_rows($select_query_run) > 0)
                  {
                      while ($row = mysqli_fetch_assoc($select_query_run)) 
                      {
                          $company = $row['company_name'];
                          $job = $row['job_title'];
                          $eligible_b = $row['branch'];
                          $m_cgpa = $row['cgpa'];
                          $skill = $row['skills'];
                          $ldate = $row['last_date'];
                          $to=$row1['email_id'];
                          $subject="Job Offer";
                          $body="Company Name: $company\nJob Title: $job\nEligible Branch: $eligible_b\nMinimum CGPA: $m_cgpa\nSkills   Required: $skill\nLast Date to Apply: $ldate";
                         $headers = "From: istudent2021@gmail.com" . "\r\n" .
                                    "BCC: somebodyelse@example.com";
                         mail($to, $subject, $body, $headers);
                      }
                  }
              }
                    ?>
                      <script>
                        location.replace('job_form.php');
                      </script>
                    <?php

            }
        }    
        else{
             echo "ERROR:$sql <br> $connection->error";
         }
        mysqli_close($connection);
?>
