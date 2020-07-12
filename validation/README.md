POSTCODE VALIDATION

```
 if(!(preg_match("/(^[A-Z]{1,2}[0-9R][0-9A-Z]?[\s]?[0-9][ABD-HJLNP-UW-Z]{2}$)/i",$postcode) || preg_match("/(^[A-Z]{1,2}[0-9R][0-9A-Z]$)/i",$postcode))) {
  $postcodeErr = "Invalid postcode format";
}
```

CREDIT CARD VALIDATION

```
if (empty($_POST["cardnumber"])) {
    $cardnumberErr = "Card number is required";
    $error = true;
  } else {
    $cardnumber = test_input($_POST["cardnumber"]);
     // check if only contains numbers and whitespace and is 16 digits
    if (!preg_match("/^[0-9 ]*$/",$cardnumber)) {
      $cardnumberErr = "Only numbers allowed";
    }
    if ($cardnumberlength <> 16){
     $cardnumberErr2 = "card number must be 16 digits";
}
  }  
  ```
