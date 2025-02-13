<!DOCTYPE html>
<html>
<head>
    <title>Company Name | Vacancy</title>
	<script language="javascript" type="text/javascript" src="validateEmp.js" ></script> 
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/> 
<script language="javascript">
 document.onkeydown = function(e) {
	if(e.keyCode == 123) {
		return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
	return false;
	}
   if(e.ctrlKey && e.shiftKey && e.keyCode == 'U'.charCodeAt(0)){
	return false;
	}
	 if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
	return false;
	} 
	}
</script>
<script type="text/javascript">
function validateEmail(emailField)
{
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(emailField.value) == false) 
        {
            alert('Please enter valid Email Address');
          emailField.value="";//emailField.focus();
			return false;
        } 
}
</script>
</head>
<body>
<div style="background-color:AliceBlue;padding:1px;line-height:23px;text-align:center;">
 <h3><font color='navy'>Company Name | Vacancy</font></h3> 
 <h5><font color='navy'>Applicant Registration Form</font></h5> 
<hr size="0.1" color="navy">
</div> 
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well"> 
		<form method="post" enctype="multipart/form-data" action = "<?php $_PHP_SELF ?>">  
		<br> 
		First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		<input name="fnm" type="text" id="fnm" onkeyup="isalpha(this)" placeholder="" maxlength="34" size="30px" required>
		 <br><br>
		Middle Name&nbsp;&nbsp;&nbsp; 
		<input name="mnm" type="text" id="mnm" onkeyup="isalpha(this)" placeholder="" maxlength="34" size="30px" required>
		<br><br> 
		Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
		<input name="lnm" type="text" id="lnm" onkeyup="isalpha(this)" placeholder="" maxlength="34" size="30px" required> 
		 <br><br>
		 Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              <select name="cmbgender" id="cmbgender" style="width: 247px" required>
                <option> </option>
                <option>Male</option>
                <option>Female</option>  
				</select>
		<br><br>
		Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="email" onblur="validateEmail(this);" type="text" id="email" placeholder="" maxlength="34" size="30px" required> 
		<br><br>
		Phone Number <input name="phonenumber" type="phonenumber" id="filetitle" placeholder="" onkeyup="isPhoneNo(this)" maxlength="34" size="30px"
		required> 
		<br><br>
		Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="cmbdepartment" id="cmbdepartment" style="width: 247px" required>
                <option> </option>
                <option>Internal Medicine</option>
                <option>Pediatrics and Child Health</option>
                <option>Surgery</option>
				<option>Orthopedic surgery</option>
				<option>Gynecology and obstetrics</option>
				<option>Dermatovenerology</option>
				<option>Dental Medicine</option> 
				</select>
				<br><br>
		 Job Position&nbsp;&nbsp;&nbsp;&nbsp; 
              <select name="cmbjobposition" id="cmbjobposition" style="width: 247px" required>
                <option> </option>
				<option>Professor</option>
                <option>Assistant Professor</option>
				<option>Associate Professor</option>
                <option>Lecturer</option>
                <option>Graduate Assistant I</option>
				<option>TA</option></select> 
				<br><br>
		 Upload Your&nbsp; 
		Upload CV,Profile, Experience, and other Relevant documents as a single file.
		<div class="form-group"><input type="file" name="file1"/></div>  
          <input type='checkbox' name='checkboxname' id='checkboxname' value='checked' required /> <strong><font color='red'>Remark:</font></strong> I hereby declare that the information provided is true and correct. I also understand that any willful dishonesty may result in the rejection of this application or immediate termination of employment.</br>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
				<input type="reset" name="reset" value="Clear" class="btn btn-info"/>
            </div>  
        </form> 
        </div>
    </div>  
</div>
<?php
//check if form is submitted
if (isset($_POST['submit']))
{ 
$phonenumber = $_POST['phonenumber'];
$con = new mysqli("localhost","root","","duhrm"); 
$sql1 = "SELECT * FROM candidateregistrationtbl where phonenumber = '".$phonenumber."'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
{
$ExistedEmail = $row['phonenumber'];
} 
$emails = mysqli_num_rows($result);
if($emails > 0)
{
echo '<script type="text/javascript">alert("Already exist try again!")</script>';
 }
// Validate image file size
    if (($_FILES["file1"]["size"] > 2000000)) {
  		echo '<script type="text/javascript">alert("Error file size exceeds 2MB")</script>';
    } 
else if($emails == 0)
  {
    $filename = $_FILES['file1']['name']; 
	//$filetitl = $_POST['filetitl'];
		  //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
         //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
			$con = new mysqli("localhost","root","","duhrm"); 
            $sql = 'select max(id) as id from candidateregistrationtbl';
            $result = mysqli_query($con, $sql);
                $filename = $filename;
				$fname = $_POST['fnm'];
				$mname = $_POST['mnm'];
				$lname = $_POST['lnm'];
				$flnm = $fname.' '.$mname.' '.$lname;
				$gnder = $_POST['cmbgender'];
				$email = $_POST['email'];
				$phonenumber = $_POST['phonenumber'];
				$jobtitle = $_POST['cmbdepartment'];
				$position = $_POST['cmbjobposition']; 
				$chkbx= $_POST['checkboxname']; 
                //set target directory
                $path = 'uploads/';                
                $created = date('Y-m-d H:i:s');
                move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
// insert file details into database
$con = new mysqli("localhost","root","","duhrm");  
$sql = "insert into candidateregistrationtbl(fullname,gender,email,phonenumber,jobtitle,position, filename, created,checkboxname) values('$flnm','$gnder', '$email','$phonenumber','$jobtitle','$position','$filename', '$created', '$chkbx')";
mysqli_query ($con, $sql);
	mysqli_close ($con); 
	 echo '<script type="text/javascript">alert("Successfully registered!")</script>'; 
        }
        else
        { 
	echo '<script type="text/javascript">alert("Error! please try again for pdf or docx cv format only")</script>'; 
        }
    }
    else  
   echo '<script type="text/javascript">alert("Please fill the form and select your CV to upload!")</script>';
    }
}
?>
 <div class="inputf" id="copyright" class="clear">
    <p style="text-align:center"><i><font size='2.01'>Company name</font></i><a target = "_blank" href="http://"><font> Click Here </font></a> - <?php// echo date('d-m-Y');?> </p>
  </div>
</body> 
 </html>
