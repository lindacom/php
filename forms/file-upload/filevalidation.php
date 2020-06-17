<?php
//code taken from w3schools website

//set variables
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);


if(isset($_POST["submit"])) {  
 
 // Check if image file is a actual image or fake image
  if($check !== false) {
        if (!file_exists($target_file)) {
    $status = "&#9989 File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
        }
  } else {
       if (!file_exists($target_file)) {
    $statusErr = "File is not an image.";
    
    $uploadOk = 0;
       }
  }


// Check if file already exists
if (file_exists($target_file)) {
  $statusErr = "File already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1) {
  $sizeErr =  "Your file is too large.";
  $uploadErr = "";
  $status = "";
  $statusErr = "";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && 
   $imageFileType != "png" && 
   $imageFileType != "jpeg" && 
   $imageFileType != "gif" ) {
       $statusErr = "";
       $uploadErr = "";
  $formatErr = "Only JPG, JPEG, PNG & GIF files are allowed. Please go back to the form and select another file.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $uploadErr =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $confirm = "&#9989 The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
      $status = "";
      $statusErr = "";
    $uploadErr = "Sorry, there was an error uploading your file.";
  }
}

 }
?>
