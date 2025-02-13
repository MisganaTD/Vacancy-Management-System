<?php  
    if($_REQUEST['id']){
        $file_id=$_REQUEST['id'];
		$con = new mysqli("localhost","root",""," "); 
        //$query=mysqli_query("SELECT * FROM doc_formatfile WHERE id='$file_id'") or die(mysqli_error());
		$query="DELETE FROM candidateregistrationtbl WHERE id='$file_id'";
        mysqli_query($con,$query); 
		echo '<script type="text/javascript">alert("Deleted Succesfully");window.location=\'index.php\';</script>';
	}
?>