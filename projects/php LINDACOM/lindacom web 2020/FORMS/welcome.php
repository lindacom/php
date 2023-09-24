
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome form</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://lindacom.infinityfreeapp.com/css/app.scss">
   <link rel="stylesheet" type="text/css" href="http://lindacom.infinityfreeapp.com/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />

<style>
.round {

border-radius: 5000px;
    text-transform: uppercase;
    font-size: 12px;
    margin-bottom: 0;
}
</style>
</head>
<body>

<div class="grid-container">
<div class="grid-x">
  <div class="cell medium-6 large-4"><img src="http://lindacom.infinityfreeapp.com/images/frog-welcome.jpg"></div>
  <div class="cell medium-6 large-8">
  
  <h2 style="margin-top:70px">
<?php
echo "Welcome<br>";

echo $_POST['name'];
?>
</h2>
<a href="http://lindacom.infinityfreeapp.com/forms.php" class="round button">More</a>

</div>
</div>

</div>
</body>
</html>