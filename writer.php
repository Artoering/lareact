<?php
/* John Longworth December 2016
     To test type this into browser 
     127.0.0.1/writer.php?field=7&value=3
 */

$servername = "localhost";
$username = "GaNuG";
$password = "SecretCode21";
$dbname = "test";
$field = $_GET['field'];
$value = $_GET['value'];

// Insert these values if none have been passed
if (!$field) { 
  $field = 23;
}
if (!$value) {
  $value = 17;
}

echo("Field = ".$field."    "."Value = ".$value."<BR>");

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password ) 
  or die("Connection failed! ".mysqli_error());

// Select database
mysqli_select_db($conn,$dbname) 
  or die ("Database selection failed! ".mysqli_error());  

$now = new DateTime();  
$datenow = $now->format("Y-m-d H:i:s");

$sql = "INSERT INTO writeread (logdata, field, value) VALUES ('$datenow','$field','$value')";
$result = mysqli_query($conn,$sql)
  or die("Invalid query: ".mysqli_error());
	
echo "<h2>The Field and Value data have been sent</h2>";

mysqli_close($conn);
?>