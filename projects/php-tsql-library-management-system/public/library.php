<?php
$day = date('l');
$time = date('H:i');
$hour = date('H');
?>


<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="utf-8"> 
<title>Library Management system</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/css.css">
    </head>
  
  <body> 
  <p>Today is <?php echo $day; ?>. The time is now <?php echo $time; ?></p>

  <?php if ($hour > 5 && $hour <12) { ?>
<p>Good morning. </p>
<?php } elseif ($hour >=12 && $hour < 18) { ?>
<p>Good afternoon. </p>
<?php } elseif ($hour >=18 && $hour < 23) { ?>
<p>Good evening</p>
<?php } else { ?>
  <p>It's late at night.</p>
<?php } ?>
          </body>
  </html>