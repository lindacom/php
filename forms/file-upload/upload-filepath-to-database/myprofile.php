DATABASE CONNECTION
===================

<?php 
include 'db.php';
?>

FETCH RECORD
============
<?php 
$username = $_GET['username'];

$sql = "SELECT user_id, user_name, user_email, user_type FROM blogusers WHERE user_name='$username' ";
$result = $connect->query($sql);
$fetchRow = mysqli_fetch_assoc($result);
 
$connect->close();
?>

DISPLAY RECORD
===============

<h2><?php echo $fetchRow['user_name']?></h2>

IMAGE UPLOAD FORM
==================

<form name="uploadFile" action="upload.php?username=<?php echo $fetchRow['user_name']?>" method="post" enctype="multipart/form-data" id="upload-form">
		<div class="input-files">
        <label for="fileToUpload" class="button">Select a file</label>
		<input type="file" name="fileToUpload" id="fileToUpload" class="show-for-sr" onchange="changeEventHandler()">
        
		</div>
        <div id="mytext"></div>
		<input type="submit" name="submit" value="submit" class="button">
	</form>
