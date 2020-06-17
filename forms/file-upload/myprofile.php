<!doctype html>
<html>
<head>
<title>Form with validation</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/css/app.scss">
   <link rel="stylesheet" type="text/css" href="/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
 <style>
         .error {color: #FF0000;}

        
#div1 {
  font-size:48px;
}

.fileuploadwidth {
    
    background: #fff;
    background-clip: padding-box;
    border: 10px solid rgba(12,13,13,.25);
    border-radius: 10px;
    margin: 20vh auto 10px;
    max-width: 425px;
    padding: 30px;
    width: auto;

}
</style>
     
</head>

<body>

<!-- status display messages -->
<p><?php echo $status;?></p>
<span class = "error"><?php echo $statusErr;?></span>
<p><?php echo $confirm;?> </p>
<span class = "error"><?php echo $uploadErr;?></span>
<span class = "error"><?php echo $formatErr;?></span>
<span class = "error"><?php echo $sizeErr;?></span>







 
  
<div class="fileuploadwidth">
<h1>Upload profile image</h1>
<p>Upload files to the server.</p>
<hr />

<!-- progress bar -->


<label for="file" id="filestatus">Uploading progress:</label>
<progress id="file" value="0" max="100">  </progress>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

   <div class="grid-container">
    <div class="grid-x grid-padding-x">
     
      

  
  

  <div class="medium-12 cell"  id="selectafile">
  <p>Select image to upload:</p>
  <label for="fileToUpload" class="button">Select a file</label>
<input type="file" name="fileToUpload" id="fileToUpload" class="show-for-sr" onchange="changeEventHandler()" >

</div>

<div class="medium-12 cell">
<p id="mytext"></p>
  <input type="submit" class="button" id="uploadImage" value="Upload Image" name="submit" style="display:none">
<button class="button [success secondary alert]" name="reset" input type="reset">CLEAR SELECTION</a>
  </div>


  </div>
  </div>
</form>



</div>

<script>
// file upload change event

function changeEventHandler() {
    // When file is selected the inner html and value of progress bar changes
     document.getElementById('file').innerHTML = 'File selected'; 
     document.getElementById('filestatus').innerHTML = 'File selected - 50% complete';
     document.getElementById('file').value = '50'; 

     var input = document.getElementById( 'fileToUpload' );
     var infoArea = document.getElementById( 'mytext' );

     // the input has an array of files in the `files` property, each one has a name that you can use. 
     var fileName = input.files[0].name;
  
  // use fileName in the infoarea variable
  infoArea.innerHTML = 'File name: ' + fileName;

    // display the hidden upload image buttn
    document.getElementById('selectafile').style.display = 'none'; 
    document.getElementById('uploadImage').style.display = 'block'; 
     
}
</script>
</body>
</html>
