<?php
// Array with names
$a = [
"ACC406","HBU111","HTH423",
"HTH427","MGT400","TFC501",
"HTH581","HTM400","HTH566",
"HTH555","HTH500","HBU131",
"ECO560","CTU551","TFC401",
"MKT410","STA404","HTM606",
"HTH678","HTH665","ELC550","HTC630"];

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";
$option_hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
      if ($option_hint === "") {
        $option_hint = "<option>".$name."</option>";
      } else {
        $option_hint .= "<option>".$name."</option>";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
echo $option_hint === "" ? "<option>no suggestion</option>" : $option_hint;
?>
