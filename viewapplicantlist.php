<?php
// fetch files
$con = new mysqli("localhost","root",""," "); 
//$sql = "select * from candidateregistrationtbl";
//$result = mysqli_query($con, $sql); 
$limit=isset($_POST["limitrecord"]) ? $_POST["limitrecord"] : 25;//25; 
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$start=($page-1)*$limit;
$resultp1=$con->query("select count(id) as id from candidateregistrationtbl");
$dailydispcount=$resultp1->fetch_all(MYSQLI_ASSOC);
$total=$dailydispcount[0]['id'];
$pages=ceil($total/$limit);
if($page==1)
{
$previous=$page;
}
if($page!=1)
{
$previous=$page - 1;
}
if($page==$pages)
{
$next=$page;
}
if($page!=$pages)
{
$next=$page + 1;
}
if (!isset($_SESSION)) 
{
  session_start();
}
if(isset($_SESSION)) 
{
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Company Name | Vacancy</title>
	<style>
		table tr td{text-align:center;}
		.bottom a{color:#D3D3D3;}
		.bottom a:link{text-decoration:none;}
		input{padding:10px;}
		.login{background-color:#3b5998;color:white;}
		.check{background-color:#32CD32;color:white;padding:12px;}
		.inputf a:link{text-decoration:none;} 
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: left;
}

li a {
  display: block;
  color: #333333;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
} 
	</style>
	<script type="text/javascript" src="validateEmp.js" ></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
<!---    <link rel="stylesheet" href="bootstrap.min.css" type="text/css" />---->
	<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	<!-- Homepage  Specific Elements --> 
</head>
<body id="top">
<div style="background-color:AliceBlue;padding:5px;line-height:23px;text-align:center;">
<span style="color:purple;"><h3><font color='navy'>Company Name | Vacancy</font></h3></span>
<span style="color:purple;"><h5><font color='navy'>Applicant List</font></h5></span>
<hr size="0.1" color="navy">
</div> 
<div class="container">   
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr align="center">
                        <td align="center"><strong>#</th>
						 <td align="center"><strong>Name</td> 
						 <td align="center"><strong>Email</td>
						 <td align="center"><strong>Job Title</td> 
                        <td align="center"><strong>Action</td> 
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
$resultp=$con->query("select * from candidateregistrationtbl LIMIT $start, $limit");
$dailydisps=$resultp->fetch_all(MYSQLI_ASSOC);
foreach($dailydisps as $d): 
                //while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>					
                    <td><?php  
					echo $d['fullname']; ?></td>   
					 <td><?php  
					echo $d['email']; ?></td> 
					<td><?php  
					echo $d['jobtitle']; ?></td>  
					<!--<td><?php  					
					//$id=$row['id'];
					//echo $row['fullname']; ?></td>--->
                    <td colspan='5'><a href="uploads/<?php echo $d['filename']; ?>" target="_blank">View  
					 | </a> <a href="uploads/<?php echo $d['filename']; ?>" download>Download</a>  
					<!--<a href="deletefile.php?id=<?php// echo $row['id']?>" onclick='return ConfirmDelete();'>Delete</a> --->
					</td>
                    <!--<td></td> for download file--->
                </tr>
<?php
endforeach;
 ?>
       </tbody>
      </table>
<div id="pagenav">
<ul>
<li><a href="viewapplicantlist.php?page=<?= $previous; ?>">Previous</a></li>
<?php 
for($i=1; $i <= $pages; $i++): 
?>
<li><a href="viewapplicantlist.php?page=<?= $i; ?>"><?= $i; ?></a></li> 
<?php endfor;?>
<li><a href="viewapplicantlist.php?page=<?= $next; ?>">Next</a></li> 
</ul>
</div>
<div>
<form method="post" action="#">
<select name="limitrecord" id="limitrecord">
<option disabled="disabled" selected="selected">---Limit pages---</option>
<?php foreach([25,50,100,500,1000,2000,4000] as $limt): ?>
<option <?php if(isset($_POST["limitrecord"]) && $_POST["limitrecord"]==$limt ) echo "selected";?> value="<?= $limt; ?>"><?= $limt; ?></option>
<?php endforeach;?>
</select>
</form>
</div>
      </div>
    </div>
</div>
 <div class="inputf" id="copyright" class="clear">
    <p style="text-align:center"><i><font size='2.01'>Company name</font></i><a target = "_blank" href="http://"><font> Click Here </font></a> - <?php// echo date('d-m-Y');?> </p>
  </div>
<script type="text/javascript">
$(document).ready(function(){
$("#limitrecord").change(function(){
$('form').submit();
})})
</script>   
</body>  
</html>
