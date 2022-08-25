PHP variables
====================
Strings can be stored in variables.  You can add two strings together using the dot operator e.g. <?php ech $description . $answer; ?>

Manipulating variables
----------------------------
to change to uppercase <?php echo strtoupper($city); ?>

PHP time
================
```
<?php
$day = date('l');
$time = date('H:i');
$hour = date('H');
?>

<p>Today is <?php echo $day; ?>. The time is now <?php echo $time; ?></p>
```
