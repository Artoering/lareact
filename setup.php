<?php
// John Longworth December 2016

$servername = "localhost";
$username = "GaNuG";
$password = "SecretCode21";
$dbname = "test";

// Connect to mysql server
$conn = mysqli_connect($servername,$username,$password) 
  or die("Connection failed! ".mysqli_error());
// Select database
mysqli_select_db($conn,$dbname) 
  or die ("Database selection failed! ".mysqli_error());    
  
$sql = "DROP TABLE IF EXISTS writeread";
$result = mysqli_query($conn,$sql)
  or die("Invalid query 1: ".mysqli_error());    
  
$sql = "CREATE TABLE writeread (logdata datetime,field varchar(20),value bigint(20))";
$result = mysqli_query($conn,$sql)
  or die("Invalid query 2: ".mysqli_error());  

$sql = "INSERT INTO writeread (logdata, field, value) VALUES ('2017-01-01 06:30:10','25','62')";
$result = mysqli_query($conn,$sql)
  or die("Invalid query 3: ".mysqli_error());   

$sql = "SELECT * FROM writeread";
$result = mysqli_query($conn,$sql)
  or die("Invalid query 4: ".mysqli_error());     
  
echo "Table created successfully.";  

$num_rows = mysqli_num_rows($result);  
if ($num_rows > 0) {  
  echo "<table border='2'><tr><th>Log Date</th><th>Field</th><th>Value</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {  
    echo "<tr>";
    echo "<td>".$row['logdata']."</td>";
    echo "<td>".$row['field']."</td>";
    echo "<td>".$row['value']."</td>";
    echo "</tr>";
  }  
echo "</table>";     
echo "Number of rows = ".$num_rows;
}  
  
mysqli_close($conn);
?>