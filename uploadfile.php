<?php
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name']; 
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phonenumber = $_POST['phonenumber'];
				$jobtitle = $_POST['cmbdepartment'];
				$position = $_POST['cmbjobposition']; 
				// Validate image file size
    if (($_FILES["file1"]["size"] > 2000000)) {
  		echo '<script type="text/javascript">alert("File size exceeds 2MB")</script>';
    } 
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from candidateregistrationtbl';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
			$con = new mysqli("localhost","root","","duhrm"); 
  //$sql = "insert into tasks(task, date,time) values('$task','$date')";
  $sql = "insert into candidateregistrationtbl(fullname,email,phonenumber,jobtitle,position,filename, created) values('$fullname','$email','$phonenumber','$jobtitle','$position','$filename', '$created')";
mysqli_query ($con, $sql);
	mysqli_close ($con);
	 echo '<script type="text/javascript">alert("Successfully registered!");window.location=\'http://jobs.du.edu.et/\';</script>';
  //header("Location: index.php?st=success");
        }
        else
        {
            header("Location: index.php?st=error");
        }
    }
    else
        header("Location: index.php");
}
?>