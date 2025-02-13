<?php
//include_once 'dbconnect.php';

// fetch files
$con = new mysqli("localhost","root","",""); 
$sql = "select * from doc_formatfile";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HRSystem - Dilla University</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
<!---    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />--->
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
</head>
<body>
<br/>
<div class="container">
   <!----- <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well"> 
		<form method="post" enctype="multipart/form-data" action = "<?php// $_PHP_SELF ?>">
		File Name&nbsp;<input name="filetitle" type="text" id="filetitle" placeholder="" maxlength="34" size="30px"
		required>
            <p>Select File to Upload:</p> 
            <div class="form-group">
                <input type="file" name="file1" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
            </div>
            
        </form>
        </div>
    </div>------>
	<h5  align="center"><font color="navy">Document Format</font></h5>
    <hr>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Format Name</th>
                        <th> </th> 
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
					
                    <td><?php 
					$id=$row['id'];
					echo $row['filetitle']; ?></td>
                    <td colspan='2'><a href="/duhr/org/docformat/uploads/<?php echo $row['filename']; ?>" target="_blank">View</a>
					&nbsp;&nbsp;&nbsp;|&nbsp;<a href="/duhr/org/docformat/uploads/<?php echo $row['filename']; ?>" download>Download</a> 
					</td>
                    <!--<td></td> for download file--->
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name']; 
	//$filetitl = $_POST['filetitl'];
    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
       // $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
     $allowed = ['pdf', 'doc','csv', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
			$con = new mysqli("localhost","root",""," "); 
            $sql = 'select max(id) as id from doc_formatfile';
            $result = mysqli_query($con, $sql);
          /* bymisg  if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else*/
                $filename = $filename;
				$filetitl = $_POST['filetitle'];

            //set target directory
            $path = 'uploads/';
                
            $created = date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
          	$con = new mysqli("localhost","root",""," "); 
  //$sql = "insert into tasks(task, date,time) values('$task','$date')";
  $sql = "insert into doc_formatfile(filetitle, filename, created) values('$filetitl','$filename', '$created')";
mysqli_query ($con, $sql);
	mysqli_close ($con);
	 echo '<script type="text/javascript">alert("Uploaded!");window.location=\'http://10.150.5.90:81/docformat/\';</script>';
  //header("Location: index.php?st=success");
        }
        else
        {
             echo '<script type="text/javascript">alert("Error!");window.location=\'http://10.150.5.90:81/docformat/\';</script>';
        }
    }
    else
     // header("Location: index.php");
   echo '<script type="text/javascript">alert("Select file for upload!");window.location=\'http://10.150.5.90:81/docformat/\';</script>';
}
?>
</body> 
<script> 
function ConfirmDelete() {
  var confm = window.confirm("Are you sure want to delete this file !");
  if(confm == true) {
	  // alert('Data deleted');
      return true;
  } else {
      return false;
  }
}
</script> 
</html>
